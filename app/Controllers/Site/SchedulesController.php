<?php

namespace App\Controllers\Site;

use App\Controllers\BaseController;
use App\Libraries\CalendarService;
use App\Libraries\ScheduleService;
use App\Libraries\UnitService;
use CodeIgniter\Config\Factories;

class SchedulesController extends BaseController
{
    /** @var ScheduleServicee  */
    private ScheduleService $scheduleService;

/** @var CalendarService  */
private CalendarService $calendarService;

    public function __construct()
    {
        $this->scheduleService = Factories::class(ScheduleService::class);
        $this->calendarService = Factories::class(CalendarService::class);
    }


    public function index()
    {
        
         $data = [
            'title' => 'Criar Agendamento',
            'units' => $this->scheduleService->renderUnits(),
            'months' => $this->calendarService->renderMonths(),
        ];
        $data['calendar'] = $this->calendarService->generate(month: 12);

        return view('Site/Schedules/new', $data); 

    }


    public function UnitServices()
    {
        $this->checkMethod('ajax');
        $unitId = (int) $this->request->getGet('unit_id');
        $services = $this->scheduleService->renderUnitsServices(unitId: $unitId);
        return $this->response->setJSON([
            'services' => $services,
        ]);
    }



    public function getCalendar()
    {
        $this->checkMethod('ajax');
        $month = (int) $this->request->getGet('month');
        //$services = $this->scheduleService->renderUnitsServices(unitId: $unitId);
        return $this->response->setJSON([
            'calendar' => null,
        ]);

    }
}
