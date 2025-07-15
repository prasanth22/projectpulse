<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Admin',
                'email' => 'admin@email.com',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'role' => 'admin',
            ],
            [
                'name' => 'User1',
                'email' => 'user1@email.com',
                'password' => password_hash('user123', PASSWORD_DEFAULT),
                'role' => 'employee',
            ]
        ];

        // Insert to the 'users' table
        $this->db->table('users')->insertBatch($data);
    }
}
