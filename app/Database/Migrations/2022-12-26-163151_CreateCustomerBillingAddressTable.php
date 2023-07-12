<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCustomerBillingAddressTable extends Migration
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
            'contact_number' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'street' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'city' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'area' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'district' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'state' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'pincode' => [
                'type' => 'INT',
                'constraint' => 6,
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
            'iec_number' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
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
        $this->forge->createTable('customer_billing_address', true);
    }

    public function down()
    {
        $this->forge->dropTable('customer_billing_address');
    }
}