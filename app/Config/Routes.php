<?php

use App\Controllers\Site\HomeController as WebController;
use App\Controllers\Admin\HomeController;
use App\Controllers\Admin\ServicesController;
use App\Controllers\Admin\UnitsController;
use App\Controllers\Admin\UnitsServicesController;
use App\Controllers\Site\SchedulesController;
use CodeIgniter\Router\RouteCollection;


/**
 * @var RouteCollection $routes
 */
$routes->get('/', [WebController::class, 'index'], ['as' => 'home']);



/**
 * @todo Bloco onde colocamos permissões/ autenticações
 */

$routes->group('admin', static function ($routes){

    /* Rotas das Pagians de Adimistradores */
    $routes->get('/', [HomeController::class, 'index'], ['as' => 'admin.home']);


    /* Grupo de Rotas para Unidades */
    $routes->group('units', static function ($routes) {

        $routes->get('/', [UnitsController::class, 'index'], ['as' => 'admin.units']);
        $routes->get('edit/(:num)', [UnitsController::class, 'editar/$1'], ['as' => 'admin.units.edit']);
        $routes->get('new', [UnitsController::class, 'new'], ['as' => 'admin.units.new']);
        $routes->post('create', [UnitsController::class, 'create'], ['as' => 'admin.units.create']);
        $routes->put('update/(:num)', [UnitsController::class, 'update/$1'], ['as' => 'admin.units.update']);
        $routes->put('status/(:num)', [UnitsController::class, 'status/$1'], ['as' => 'admin.units.status']);
        $routes->delete('delete/(:num)', [UnitsController::class, 'delete/$1'], ['as' => 'admin.units.delete']);


        /* Rotas dos Serviços das Unidades */
        $routes->get('services/(:num)', [UnitsServicesController::class, 'services/$1'], ['as' => 'admin.units.services']);
        $routes->put('services/store/(:num)', [UnitsServicesController::class, 'store/$1'], ['as' => 'admin.units.services.store']);

    });
    $routes->group('services', static function ($routes) {

        $routes->get('/', [ServicesController::class, 'index'], ['as' => 'admin.services']);

        $routes->get('edit/(:num)', [ServicesController::class, 'editar/$1'], ['as' => 'admin.services.edit']);
        $routes->get('new', [ServicesController::class, 'new'], ['as' => 'admin.services.new']);
        $routes->post('create', [ServicesController::class, 'create'], ['as' => 'admin.services.create']);
        $routes->put('update/(:num)', [ServicesController::class, 'update/$1'], ['as' => 'admin.services.update']);
        $routes->put('status/(:num)', [ServicesController::class, 'status/$1'], ['as' => 'admin.services.status']);
        $routes->delete('delete/(:num)', [ServicesController::class, 'delete/$1'], ['as' => 'admin.services.delete']);
    });
});



/**
 * @todo Bloco de rodas de Agendamentos do usuário logado
 */
$routes->group('schedules', static function ($routes) {

    $routes->get('/', [WebController::class, 'schedules'], ['as' => 'schedules']);
    $routes->get('new', [SchedulesController::class, 'index'], ['as' => 'schedules.new']);
    $routes->get('services', [SchedulesController::class, 'unitServices'], ['as' => 'get.unit.services']);
    $routes->get('calendar', [SchedulesController::class, 'getCalendar'], ['as' => 'get.calendar']);
    

});

