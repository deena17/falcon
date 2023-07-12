<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateCustomerCallTable extends Migration
{
    public function up()
    {
        $fields = [
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
                'constraint' => 50,
            ],
            'installation_date' => [
                'type' => 'DATE',
                'null' => false
            ],
            'expiry_date' => [
                'type' => 'DATE',
                'null' => false
            ],
            'service_type_id' => [
                'type' => 'INT',
                'constraint' => 5
            ],
            'contact_person_id' => [
                'type' => 'INT',
                'constraint' => 5
            ],
            'department_id' => [
                'type' => 'INT',
                'constraint' => 5
            ],
            'contact_number' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ]
        ];
        $this->forge->addForeignKey('product_id', 'mst_product', 'id');
        $this->forge->addForeignKey('department_id', 'mst_department', 'id');
        $this->forge->addForeignKey('product_model_it', 'mst_product_model', 'id');
        $this->forge->addForeignKey('service_type_id', 'mst_service_type', 'id');
        $this->forge->addForeignKey('contact_person_id', 'users', 'id');
        $this->forge->addColumn('customer_calls', $fields);
    }


    public function down()
    {
        //
    }
}
