<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEnquiryFollowupTable extends Migration
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
            'enquiry_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'null' => false,
                'unsigned' => true
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
            'followup_date' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'next_date' => [
                'type' => 'DATE',
                'null' => true
            ],
            'customer_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'null' => true,
                'unsigned' => true
            ],
            'discussions' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
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
        $this->forge->createTable('enquiry_followup', true);
    }

    public function down()
    {
        $this->forge->dropTable('enquiry_followup');
    }
}