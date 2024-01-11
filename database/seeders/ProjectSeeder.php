<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear existing records to start with a clean slate
        //DB::table('projects')->truncate();

        // Seed the projects table with sample data
        DB::table('projects')->insert([
            [
                'system_owner' => 'Business Unit A',
                'system_pic' => 'John Doe',
                'start_date' => now(),
                'duration' => 30,
                'end_date' => now()->addDays(30),
                'status' => 'In Progress',
                'lead_developer' => 'Lead Developer A',
                'developers' => 'Developer A, Developer B',
                'methodology' => 'Agile',
                'platform' => 'Web-based',
                'deployment_type' => 'Cloud',
            ],
            [
                'system_owner' => 'Business Unit B',
                'system_pic' => 'Jane Doe',
                'start_date' => now(),
                'duration' => 45,
                'end_date' => now()->addDays(45),
                'status' => 'Pending',
                'lead_developer' => 'Lead Developer B',
                'developers' => 'Developer C, Developer D',
                'methodology' => 'Waterfall',
                'platform' => 'Mobile',
                'deployment_type' => 'On-premises',
            ],
            // Add more sample projects as needed
        ]);
    }
}
