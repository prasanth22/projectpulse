<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Call each seeder you want to run here.
        $this->call('UserSeeder');

        // Example: if you add more later
        // $this->call('RoleSeeder');
         $this->call('ProjectSeeder');
    }
}
