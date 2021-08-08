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
        // StudentClasse::create([
        //     'student_id' => 3,
        //     'class_id' => "ITF99999"
        // ]);
        StudentClasse::insert([
            [
                'student_id' => 3,
                'class_id' => "ITF99999",
            ],
            [
                'student_id' => 4,
                'class_id' => "ITF99999",
            ],
            [
                'student_id' => 7,
                'class_id' => "ITF99999",
            ],
            [
                'student_id' => 8,
                'class_id' => "ITF99999",
            ],
            [
                'student_id' => 9,
                'class_id' => "ITF99999",
            ],
            [
                'student_id' => 11,
                'class_id' => "PLA61205",
            ],
            [
                'student_id' => 12,
                'class_id' => "PHP91350",
            ],
            [
                'student_id' => 13,
                'class_id' => "HNA12850",
            ],
            [
                'student_id' => 14,
                'class_id' => "SOF25919",
            ],
            [
                'student_id' => 16,
                'class_id' => "PRE91085",
            ],
            [
                'student_id' => 17,
                'class_id' => "BUR87159",
            ],
            [
                'student_id' => 18,
                'class_id' => "BAL72512",
            ],
            [
                'student_id' => 19,
                'class_id' => "APR28600",
            ],
            [
                'student_id' => 20,
                'class_id' => "AST80001",
            ],
            [
                'student_id' => 21,
                'class_id' => "IOS87910",
            ],
            [
                'student_id' => 22,
                'class_id' => "AND41960",
            ],
            [
                'student_id' => 23,
                'class_id' => "TEA71258",
            ],
            [
                'student_id' => 24,
                'class_id' => "LOG00092",
            ],
            [
                'student_id' => 25,
                'class_id' => "MAS00024",
            ],
            [
                'student_id' => 26,
                'class_id' => "WET77777",
            ],
            [
                'student_id' => 27,
                'class_id' => "STE66868",
            ],
            [
                'student_id' => 28,
                'class_id' => "BAK12655",
            ],
            [
                'student_id' => 29,
                'class_id' => "EPR12875",
            ],
            [
                'student_id' => 30,
                'class_id' => "EUR28517",
            ],
            [
                'student_id' => 31,
                'class_id' => "ITA21585",
            ],
            [
                'student_id' => 32,
                'class_id' => "SOL12657",
            ],
            [
                'student_id' => 33,
                'class_id' => "BIL81824",
            ],
            [
                'student_id' => 34,
                'class_id' => "HOW18158",
            ]
        ]);
    }
}
