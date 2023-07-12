<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserDepartmentTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user' => [
                'type' => 'MEDIUMINT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'department' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ]
        ]);
        $this->forge->addKey('id');
        $this->forge->addForeignKey('user', 'users', 'id');
        $this->forge->addForeignKey('department', 'mst_department', 'id');
        $this->forge->createTable('users_department');
    }

    public function down()
    {
        $this->forge->dropTable('users_department');
    }
}