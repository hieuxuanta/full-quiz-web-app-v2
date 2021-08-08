<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([[
            'class_id' => "ITF99999",
            'course_sec' => "ITFIELD 113",
            'instructor_id' => 2,
            'subject_id' => 1,
            'class_active' => true
        ]]);
        DB::table('classes')->insert([[
            'class_id' => "PLA61205",
            'course_sec' => "Planet Lifecycle",
            'instructor_id' => 2,
            'subject_id' => 3,
            'class_active' => true
        ]]);
        DB::table('classes')->insert([[
            'class_id' => "KAI95710",
            'course_sec' => "Kaiba Magento",
            'instructor_id' => 2,
            'subject_id' => 1,
            'class_active' => true
        ]]);
        DB::table('classes')->insert([[
            'class_id' => "PHP91350",
            'course_sec' => "PHP Mastery",
            'instructor_id' => 2,
            'subject_id' => 1,
            'class_active' => true
        ]]);
        DB::table('classes')->insert([[
            'class_id' => "HNA12850",
            'course_sec' => "HNA20 FR Angular01",
            'instructor_id' => 2,
            'subject_id' => 1,
            'class_active' => true
        ]]);
        DB::table('classes')->insert([[
            'class_id' => "SOF25919",
            'course_sec' => "Soft Skill for beginners",
            'instructor_id' => 5,
            'subject_id' => 2,
            'class_active' => true
        ]]);
        DB::table('classes')->insert([[
            'class_id' => "PRE91085",
            'course_sec' => "Present with Powerpoint",
            'instructor_id' => 5,
            'subject_id' => 2,
            'class_active' => true
        ]]);
        DB::table('classes')->insert([[
            'class_id' => "BUR87159",
            'course_sec' => "Burger Mastery",
            'instructor_id' => 5,
            'subject_id' => 4,
            'class_active' => true
        ]]);
        DB::table('classes')->insert([[
            'class_id' => "BAL72512",
            'course_sec' => "Ballpassing Technique",
            'instructor_id' => 5,
            'subject_id' => 5,
            'class_active' => true
        ]]);
        DB::table('classes')->insert([[
            'class_id' => "APR28600",
            'course_sec' => "Apron and Tips",
            'instructor_id' => 5,
            'subject_id' => 4,
            'class_active' => true
        ]]);
        DB::table('classes')->insert([[
            'class_id' => "AST80001",
            'course_sec' => "Astronauts' Life",
            'instructor_id' => 6,
            'subject_id' => 3,
            'class_active' => true
        ]]);
        DB::table('classes')->insert([[
            'class_id' => "IOS87910",
            'course_sec' => "IOS Understanding",
            'instructor_id' => 6,
            'subject_id' => 6,
            'class_active' => true
        ]]);
        DB::table('classes')->insert([[
            'class_id' => "AND41960",
            'course_sec' => "Android Studio",
            'instructor_id' => 6,
            'subject_id' => 1,
            'class_active' => true
        ]]);
        DB::table('classes')->insert([[
            'class_id' => "TEA71258",
            'course_sec' => "Teamworking",
            'instructor_id' => 6,
            'subject_id' => 2,
            'class_active' => true
        ]]);
        DB::table('classes')->insert([[
            'class_id' => "LOG00092",
            'course_sec' => "Logitech and products",
            'instructor_id' => 6,
            'subject_id' => 6,
            'class_active' => true
        ]]);
        DB::table('classes')->insert([[
            'class_id' => "MAS00024",
            'course_sec' => "Masterchef Dream",
            'instructor_id' => 10,
            'subject_id' => 4,
            'class_active' => true
        ]]);
        DB::table('classes')->insert([[
            'class_id' => "WET77777",
            'course_sec' => "Wetalk to the crowd",
            'instructor_id' => 10,
            'subject_id' => 2,
            'class_active' => true
        ]]);
        DB::table('classes')->insert([[
            'class_id' => "STE66868",
            'course_sec' => "Steak Advanced",
            'instructor_id' => 10,
            'subject_id' => 4,
            'class_active' => true
        ]]);
        DB::table('classes')->insert([[
            'class_id' => "BAK12655",
            'course_sec' => "Baking Technique",
            'instructor_id' => 10,
            'subject_id' => 4,
            'class_active' => true
        ]]);
        DB::table('classes')->insert([[
            'class_id' => "EPR12875",
            'course_sec' => "EProduct placement",
            'instructor_id' => 10,
            'subject_id' => 6,
            'class_active' => true
        ]]);
        DB::table('classes')->insert([[
            'class_id' => "EUR28517",
            'course_sec' => "Europa League",
            'instructor_id' => 15,
            'subject_id' => 5,
            'class_active' => true
        ]]);
        DB::table('classes')->insert([[
            'class_id' => "ITA21585",
            'course_sec' => "ITAdvanced",
            'instructor_id' => 15,
            'subject_id' => 1,
            'class_active' => true
        ]]);
        DB::table('classes')->insert([[
            'class_id' => "SOL12657",
            'course_sec' => "Solar system",
            'instructor_id' => 15,
            'subject_id' => 3,
            'class_active' => true
        ]]);
        DB::table('classes')->insert([[
            'class_id' => "BIL81824",
            'course_sec' => "Billiard Bankshot Expertise",
            'instructor_id' => 15,
            'subject_id' => 5,
            'class_active' => true
        ]]);
        DB::table('classes')->insert([[
            'class_id' => "HOW18158",
            'course_sec' => "How to be talkative",
            'instructor_id' => 15,
            'subject_id' => 2,
            'class_active' => true
        ]]);
    }
}
