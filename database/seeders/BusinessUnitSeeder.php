<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('business_units')->insert([
            [
                'name' => 'Electric Department'
            ],
            [
                'name' => 'Accounting Department'
            ],
            [
                'name' => 'Engineering Department'
            ],
            [
                'name' => 'Sport Department'
            ],
            [
                'name' => 'Software Engineering Department'
            ],
            
        ]); 
    }
}
