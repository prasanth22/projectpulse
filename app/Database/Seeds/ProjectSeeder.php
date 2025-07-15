<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'project_name'       => 'Internal Automation Tool',
                'description' => 'A project to automate internal admin tasks.',
                'project_head' => 1, // assuming user_id 1 is Admin
            ],
            [
                'project_name'       => 'Company Website Revamp',
                'description' => 'Updating UI/UX and backend of the website.',
                'project_head'  => 2, // assuming user_id 2 is Employee
            ]
        ];

        $this->db->table('projects')->insertBatch($data);
    }
}
