<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateServiceCallEngineerTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unique' => true,
                'auto_increment' => true
            ],
            'call_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'engineer_id' => [
                'type' => 'MEDIUMINT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'created_by' => [
                'type' => 'MEDIUMINT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'updated_by' => [
                'type' => 'MEDIUMINT',
                'constraint' => 5,
                'unsigned' => true,
                'null' => true
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('call_id', 'service_call', 'id');
        $this->forge->addForeignKey('engineer_id', 'users', 'id');
        $this->forge->addForeignKey('created_by', 'users', 'id');
        $this->forge->addForeignKey('updated_by', 'users', 'id');
        $this->forge->createTable('service_call_engineer', true);
    }

    public function down()
    {
        $this->forge->dropTable('service_call_engineer');
    }
}