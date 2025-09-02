<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProjectsTopicsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],

            'type'          => [
                'type'       => 'ENUM',
                'constraint' => ['project', 'topic'],
                'default'    => 'project'
            ],

            'name'         => [
                'type'       => 'VARCHAR',
                'constraint' => 255
            ],

            'description'   => [
                'type' => 'TEXT',
                'null' => true
            ],

            'project_head'  => [
                'type' => 'INT',
                'null' => true
            ],

            'created_at'    => [
                'type' => 'DATETIME',
                'null' => true
            ],

            'updated_at'    => [
                'type' => 'DATETIME',
                'null' => true
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('projects_topics');
    }

    public function down()
    {
        $this->forge->dropTable('projects_topics', true); // true = IF EXISTS
    }
}
