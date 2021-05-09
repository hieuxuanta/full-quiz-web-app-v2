<?php

namespace Database\Seeders;

use App\Models\StudentClasse;
use Illuminate\Database\Seeder;

class StudentClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StudentClasse::create([
            'student_id' => 3,
            'class_id' => "3KMMR"
        ]);
    }
}
