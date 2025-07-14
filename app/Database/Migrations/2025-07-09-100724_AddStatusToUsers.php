<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStatusToUsers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['active', 'blocked'],
                'default'    => 'active',
                'after'      => 'role'  // Put it after 'role' column (optional)
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'status');
    }
}
