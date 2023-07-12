<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEnquiryTable extends Migration
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
            'enquiry_number' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => false,
            ],
            'enquiry_date' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'customer_type' => [
                'type' => 'INT',
                'constraint' => 2,
                'null' => false,
            ],
            'customer_id' => [
                'type' => 'INT',
                'null' => true,
                'unsigned' => true
            ],
            'customer_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'contact_number' => [
                'type' => 'VARCHAR',
                'constraint' => 40,
                'null' => false,
            ],
            'street' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'city' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'district' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'area' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'state' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'pincode' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'distance' => [
                'type' => 'INT',
                'constraint' => 5,
                'null' => false,
            ],
            'marketing_reference' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'from_time' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false,
            ],
            'to_time' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false,
            ],
            'travelling_kms' => [
                'type' => 'INT',
                'constraint' => 5,
                'null' => false,
            ],
            'next_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'remarks' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'status' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'null' => true
            ],
            'enquiry_by' => [
                'type' => 'MEDIUMINT',
                'constraint' => 5,
                'unsigned' => true,
                'null' => true
            ],
            'department' => [
                'type' => 'INT',
                'constraint' => 5,
                'null' => false,
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
        $this->forge->addForeignKey('enquiry_by', 'users', 'id');
        $this->forge->addForeignKey('status', 'mst_status', 'id');
        $this->forge->createTable('enquiry', true);
    }

    public function down()
    {
        $this->forge->dropTable('enquiry');
    }
}