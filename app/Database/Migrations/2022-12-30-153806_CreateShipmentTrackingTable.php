<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateShipmentTrackingTable extends Migration
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
            'shipment_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'date' => [
                'type' => 'DATE',
                'null' => false
            ],
            'remarks' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
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
        $this->forge->addForeignKey('shipment_id', 'shipment', 'id');
        $this->forge->addForeignKey('created_by', 'users', 'id');
        $this->forge->addForeignKey('updated_by', 'users', 'id');
        $this->forge->createTable('shipment_tracking', true);
    }

    public function down()
    {
        $this->forge->dropTable('shipment_tracking');
    }
}