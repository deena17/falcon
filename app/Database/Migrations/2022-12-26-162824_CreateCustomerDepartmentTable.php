<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCustomerDepartmentTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => true,
                'unsigned' => true
            ],
            'customer' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'department' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('customer', 'customer', 'id');
        $this->forge->addForeignKey('department', 'mst_department', 'id');
        $this->forge->createTable('customer_department', true);
    }

    public function down()
    {
        $this->forge->dropTable('customer_department', true);
    }
}