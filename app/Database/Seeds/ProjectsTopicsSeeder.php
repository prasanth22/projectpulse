<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProjectsTopicsSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        $db = \Config\Database::connect();

        // Insert Projects
        for ($i = 0; $i < 5; $i++) {
            $db->table('projects_topics')->insert([
                'type'         => 'project',
                'name'        => $faker->sentence(3),
                'description'  => $faker->paragraph,
                'project_head' => $faker->numberBetween(2, 3),
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ]);
        }

        // Insert Topics
        for ($i = 0; $i < 5; $i++) {
            $db->table('projects_topics')->insert([
                'type'         => 'topic',
                'name'        => $faker->sentence(4),
                'description'  => $faker->paragraph,
                'project_head' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
