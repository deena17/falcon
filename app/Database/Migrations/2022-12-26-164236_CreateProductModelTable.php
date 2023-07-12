<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductModelTable extends Migration
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
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 1000,
                'null' => false
            ],
            'specification' => [
                'type' => 'VARCHAR',
                'constraint' => 1000,
                'null' => false
            ],
            'product_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'dimensions' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'weight' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            # supplier, price, quantity, 
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'display' => [
                'type' => 'VARCHAR',
                'constraint' => 1,
                'default' => 'Y'
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('product_id', 'products', 'id');
        $this->forge->createTable('products_model', true);
    }

    public function down()
    {
        $this->forge->dropTable('products_model', true);
    }
}