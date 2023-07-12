<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserProfileTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 6,
                'auto_increment' => true,
                'unsigned' => true
            ],
            'first_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'designation' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'null' => true,
            ],
            'contact_number' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 6,
                'null' => false,
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('designation', 'mst_designation', 'id');
        $this->forge->createTable('users_profile', true);
    }

    public function down()
    {
        $this->forge->dropTable('users_profile');
    }
}