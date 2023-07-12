<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateInvoiceStatusTable extends Migration
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
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
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
        $this->forge->createTable('mst_invoice_status', true);
    }

    public function down()
    {
        $this->forge->dropTable('mst_invoice_status');
    }
}