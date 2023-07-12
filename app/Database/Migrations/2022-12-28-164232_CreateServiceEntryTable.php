<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateServiceEntryTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'call_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'call_number' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false,
            ],
            'call_date' => [
                'type' => 'DATE',
                'null' => false
            ],
            'service_date' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'in_time' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => false,
            ],
            'out_time' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => false,
            ],
            'action_taken' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'remarks' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'feature_expansion' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'report_number' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => false,
            ],
            'amount' => [
                'type' => 'INT',
                'constraint' => 5,
                'null' => false,
            ],
            'engineer_id' => [
                'type' => 'MEDIUMINT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'status_id' => [
                'type' => 'INT',
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
            'display' => [
                'type' => 'VARCHAR',
                'constraint' => 1,
                'default' => 'Y'
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('call_id', 'service_call', 'id');
        $this->forge->addForeignKey('created_by', 'users', 'id');
        $this->forge->addForeignKey('updated_by', 'users', 'id');
        $this->forge->addForeignKey('engineer_id', 'users', 'id');
        $this->forge->addForeignKey('status_id', 'mst_status', 'id');
        $this->forge->createTable('service_entry', true);
    }

    public function down()
    {
        $this->forge->dropTable('service_entry');
    }
}