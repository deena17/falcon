<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateQuotationTable extends Migration
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
            'customer_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'null' => true,
                'unsigned' => true
            ],
            'quotation_number' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => false,
            ],
            'quotation_date' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'due_date' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'gross_amount' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
                'unsigned' => true
            ],
            'discount' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
                'unsigned' => true
            ],
            'net_amount' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
                'unsigned' => true
            ],
            'remarks' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'status' => [
                'type' => 'INT',
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
        $this->forge->addForeignKey('status', 'mst_invoice_status', 'id');
        $this->forge->createTable('quotation', true);
    }

    public function down()
    {
        $this->forge->dropTable('quotation');
    }
}