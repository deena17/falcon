<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCustomerContactTable extends Migration
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
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'designation' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false
            ],
            'notes' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'customer_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
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
        $this->forge->createTable('customer_contact', true);
    }

    public function down()
    {
        $this->forge->dropTable('customer_contact');
    }
}