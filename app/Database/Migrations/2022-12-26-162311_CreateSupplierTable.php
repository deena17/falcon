<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSupplierTable extends Migration
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
            'vendor_code' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => false
            ],
            'office_number' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false
            ],
            'fax_number' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'city' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'country' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'zipcode' => [
                'type' => 'INT',
                'constraint' => 10,
                'null' => false
            ],
            'website' => [
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
        $this->forge->createTable('supplier', true);
    }

    public function down()
    {
        $this->forge->dropTable('supplier');
    }
}