<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateShipmentTable extends Migration
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
            'invoice_number' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => false
            ],
            'invoice_date' => [
                'type' => 'DATE',
                'null' => false
            ],
            'machine_model' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'qunatity' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'shipment_date' => [
                'type' => 'DATE',
                'null' => false
            ],
            'eta_date' => [
                'type' => 'DATE',
                'null' => true
            ],
            'vessel_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'bill_number' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false
            ],
            'bill_date' => [
                'type' => 'DATE',
                'null' => true
            ],
            'hss_date' => [
                'type' => 'DATE',
                'null' => true
            ],
            'sale_price' => [
                'type' => 'DOUBLE',
                'constraint' => '12,2'
            ],
            'duty' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'delivery_date' => [
                'type' => 'DATE',
                'null' => true
            ],
            'remarks' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'supplier_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'department_id' => [
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
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('supplier_id', 'supplier', 'id');
        $this->forge->addForeignKey('department_id', 'mst_department', 'id');
        $this->forge->addForeignKey('created_by', 'users', 'id');
        $this->forge->addForeignKey('updated_by', 'users', 'id');
        $this->forge->createTable('shipment', true);
    }

    public function down()
    {
        $this->forge->dropTable('shipment');
    }
}