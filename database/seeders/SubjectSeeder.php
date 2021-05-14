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
            'subject_code' => 'ITFIELD 113',
            'subject_desc' => 'Web Development'
        ]]);
    }
}
