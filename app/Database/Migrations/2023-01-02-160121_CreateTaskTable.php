<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTaskTable extends Migration
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
            'task_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'task_date' => [
                'type' => 'DATE',
                'null' => false
            ],
            'due_date' => [
                'type' => 'DATE',
                'null' => false
            ],
            'assigner_id' => [
                'type' => 'MEDIUMINT',
                'unsigned' => true
            ],
            'assignee_id' => [
                'type' => 'MEDIUMINT',
                'unsigned' => true
            ],
            'remarks' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
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
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('assigner_id', 'users', 'id');
        $this->forge->addForeignKey('assignee_id', 'users', 'id');
        $this->forge->addForeignKey('created_by', 'users', 'id');
        $this->forge->addForeignKey('updated_by', 'users', 'id');
        $this->forge->createTable('task', true);
    }

    public function down()
    {
        $this->forge->dropTable('task');
    }
}