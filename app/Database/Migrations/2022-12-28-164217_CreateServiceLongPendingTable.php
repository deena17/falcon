<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateServiceLongPendingTable extends Migration
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
            'customer_id' => [
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
            'call_time' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false,
            ],
            'pending_reason' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'action_taken' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'is_available' => [
                'type' => 'INT',
                'constraint' => 2,
                'null' => false,
                'default' => false
            ],
            'expected_date' => [
                'type' => 'DATE',
                'null' => false
            ],
            'ordered_date' => [
                'type' => 'DATE',
                'null' => false
            ],
            'arrival_date' => [
                'type' => 'DATE',
                'null' => false
            ],
            'follower_id' => [
                'type' => 'INT',
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
        $this->forge->addForeignKey('customer_id', 'customer', 'id');
        $this->forge->addForeignKey('created_by', 'users', 'id');
        $this->forge->addForeignKey('updated_by', 'users', 'id');
        $this->forge->addForeignKey('status_id', 'mst_status', 'id');
        $this->forge->createTable('service_long_pending', true);
    }

    public function down()
    {
        $this->forge->dropTable('service_long_pending');
    }
}