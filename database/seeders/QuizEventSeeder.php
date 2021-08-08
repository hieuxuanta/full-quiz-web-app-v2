<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quiz_events')->insert([
            [
                'quiz_event_id' => 1,
                'quiz_event_name' => 'HTML Basics',
                'questionnaire_id' => 1,
                'quiz_event_status' => 0, //upcoming quiz
                'class_id' => "ITF99999",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'quiz_event_id' => 2,
                'quiz_event_name' => 'Angular Basics',
                'questionnaire_id' => 2,
                'quiz_event_status' => 1,//pending quiz
                'class_id' => "ITF99999",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'quiz_event_id' => 3,
                'quiz_event_name' => 'Communication Basics Quiz',
                'questionnaire_id' => 3,
                'quiz_event_status' => 1,
                'class_id' => "SOF25919",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'quiz_event_id' => 4,
                'quiz_event_name' => 'Powerpoint Basics Quiz',
                'questionnaire_id' => 4,
                'quiz_event_status' => 1,
                'class_id' => "SOF25919",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'quiz_event_id' => 5,
                'quiz_event_name' => 'How to make a burger',
                'questionnaire_id' => 5,
                'quiz_event_status' => 1,
                'class_id' => "BUR87159",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'quiz_event_id' => 6,
                'quiz_event_name' => 'Ball passing quiz',
                'questionnaire_id' => 6,
                'quiz_event_status' => 1,
                'class_id' => "BAL72512",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'quiz_event_id' => 7,
                'quiz_event_name' => 'Astronaut and recognization',
                'questionnaire_id' => 7,
                'quiz_event_status' => 1,
                'class_id' => "AST80001",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'quiz_event_id' => 8,
                'quiz_event_name' => 'Apple\'s products',
                'questionnaire_id' => 8,
                'quiz_event_status' => 1,
                'class_id' => "IOS87910",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'quiz_event_id' => 9,
                'quiz_event_name' => 'Teamwork is key',
                'questionnaire_id' => 9,
                'quiz_event_status' => 1,
                'class_id' => "TEA71258",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'quiz_event_id' => 10,
                'quiz_event_name' => 'Culinary Arts',
                'questionnaire_id' => 10,
                'quiz_event_status' => 1,
                'class_id' => "MAS00024",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'quiz_event_id' => 11,
                'quiz_event_name' => 'Sql Basics',
                'questionnaire_id' => 11,
                'quiz_event_status' => 1,
                'class_id' => "ITF99999",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'quiz_event_id' => 12,
                'quiz_event_name' => 'Web Development & Internet (Advance)',
                'questionnaire_id' => 12,
                'quiz_event_status' => 1,
                'class_id' => "ITF99999",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'quiz_event_id' => 13,
                'quiz_event_name' => 'Bootstrap Basics',
                'questionnaire_id' => 13,
                'quiz_event_status' => 1,
                'class_id' => "ITF99999",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        ]);
    }
}
