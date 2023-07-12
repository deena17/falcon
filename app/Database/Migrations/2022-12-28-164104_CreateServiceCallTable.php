<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateServiceCallTable extends Migration
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
            'customer_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'contact_name' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'contact_number' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false,
            ],
            'product_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'product_model_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'serial_number' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false,
            ],
            'installation_date' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'expiry_date' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'service_type_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'complaint_nature' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'remarks' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'is_combined' => [
                'type' => 'INT',
                'constraint' => 2,
                'null' => true,
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
        $this->forge->addForeignKey('product_id', 'products', 'id');
        $this->forge->addForeignKey('product_model_id', 'products_model', 'id');
        $this->forge->addForeignKey('created_by', 'users', 'id');
        $this->forge->addForeignKey('updated_by', 'users', 'id');
        $this->forge->addForeignKey('service_type_id', 'mst_service_type', 'id');
        $this->forge->addForeignKey('status_id', 'mst_status', 'id');
        $this->forge->createTable('service_call', true);
    }

    public function down()
    {
        $this->forge->dropTable('service_call');
    }
}