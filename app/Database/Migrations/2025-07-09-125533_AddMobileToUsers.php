<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddMobileToUsers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'mobile_number' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => true,
                'after' => 'email'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'mobile_number');
    }

}
