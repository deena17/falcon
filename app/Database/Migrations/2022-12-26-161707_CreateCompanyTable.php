<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCompanyTable extends Migration
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
                'constraint' => 255,
                'null' => false
            ],
            'phone' => [
                'type' => 'bigint',
                'constraint' => 20,
                'null' => false
            ],
            'landline' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'street' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'city' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'district' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'state' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'default' => 'Tamil Nadu'
            ],
            'pincode' => [
                'type' => 'INT',
                'constraint' => 6,
                'null' => false
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'website' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'pan_number' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => false
            ],
            'gst_number' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false
            ],
            'is_active' => [
                'type' => 'INT',
                'constraint' => 1,
                'default' => true
            ],
            'logo' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
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
        $this->forge->createTable('mst_company', true);
    }

    public function down()
    {
        $this->forge->dropTable('mst_company');
    }
}