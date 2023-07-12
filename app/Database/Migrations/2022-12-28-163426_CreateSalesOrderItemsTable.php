<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSalesOrderItemsTable extends Migration
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
            'order_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'order_number' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => false,
            ],
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
            'currency_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'specification' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'quantity' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'unit_price' => [
                'type' => 'DOUBLE',
                'constraint' => '10,2',
            ],
            'total_price' => [
                'type' => 'DOUBLE',
                'constraint' => '10,2',
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
        $this->forge->addForeignKey('order_id', 'sales_order', 'id');
        $this->forge->addForeignKey('product_id', 'products', 'id');
        $this->forge->addForeignKey('product_model_id', 'products_model', 'id');
        $this->forge->addForeignKey('created_by', 'users', 'id');
        $this->forge->addForeignKey('updated_by', 'users', 'id');
        $this->forge->addForeignKey('currency_id', 'mst_currency', 'id');
        $this->forge->createTable('sales_order_items', true);
    }

    public function down()
    {
        $this->forge->dropTable('sales_order_items');
    }
}