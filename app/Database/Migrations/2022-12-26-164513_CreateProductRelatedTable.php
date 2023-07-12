<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductRelatedTable extends Migration
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
            'product' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'related' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('product', 'products_model', 'id');
        $this->forge->addForeignKey('related', 'products_model', 'id');
        $this->forge->createTable('products_related', true);
    }

    public function down()
    {
        $this->forge->dropTable('products_related');
    }
}