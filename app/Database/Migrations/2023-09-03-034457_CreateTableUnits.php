<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUnits extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,

            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 14,
                'comment' => '(99)99999-9999',
            ],
            'coordinator' => [
                'type' => 'VARCHAR',
                'constraint' => 70,
                'comment' => 'Coordenador / Gerente ',
            ],
            'adress' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'comment' => 'Endereço da unidade',
            ],
            'services' => [
                'type' => 'JSON',
                'null' => true,
                'default' => null,
                'comment' => 'Identificação dos Serviços.  Exemplo["1","2"]',
            ],
            'starttime' => [
                'type' => 'VARCHAR',
                'constraint' => 6,
                'comment' => 'Horario de Inicio do Espediante ',
            ],
            'endtime' => [
                'type' => 'VARCHAR',
                'constraint' => 6,
                'comment' => 'Horario de Termino do Espediante ',
            ],

            'servicetime' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'comment' => 'Tempo de Cada atendimento',
            ],

            'status' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
                'comment' => '0 = Destivado , 1 = Ativo ',
            ],

            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('name');
        $this->forge->addKey('email');
        $this->forge->addKey('phone');
        $this->forge->createTable('units');
    }

    public function down()
    {
        $this->forge->dropTable('units');
    }
}
