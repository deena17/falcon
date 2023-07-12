<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCustomerTable extends Migration
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
            'customer_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'contact_number' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'contact_landline' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'contact_email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'contact_street' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'contact_city' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'contact_area' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'contact_district' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'contact_state' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'contact_pincode' => [
                'type' => 'INT',
                'constraint' => 6,
                'null' => false
            ],
            'distance' => [
                'type' => 'INT',
                'constraint' => 5,
                'null' => false
            ],
            'website' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'latitude' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'longitude' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'customer_type' => [
                'type' => 'INT',
                'constraint' => 5,
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
        $this->forge->createTable('customer', true);
    }

    public function down()
    {
        $this->forge->dropTable('customer');
    }
}