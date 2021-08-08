<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([[
            'subject_id' => 1,
            'subject_code' => 'WEB00127',
            'subject_desc' => 'Web Development'
        ]]);
        DB::table('subjects')->insert([[
            'subject_id' => 2,
            'subject_code' => 'SOC03410',
            'subject_desc' => 'Social skill'
        ]]);
        DB::table('subjects')->insert([[
            'subject_id' => 3,
            'subject_code' => 'SCI00202',
            'subject_desc' => 'Science'
        ]]);
        DB::table('subjects')->insert([[
            'subject_id' => 4,
            'subject_code' => 'COO18001',
            'subject_desc' => 'Cooking'
        ]]);
        DB::table('subjects')->insert([[
            'subject_id' => 5,
            'subject_code' => 'SPO12901',
            'subject_desc' => 'Sport'
        ]]);
        DB::table('subjects')->insert([[
            'subject_id' => 6,
            'subject_code' => 'TEC00029',
            'subject_desc' => 'Technology'
        ]]);
    }
}
