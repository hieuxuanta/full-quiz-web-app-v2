<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // HTML Basics
        Question::create([
            'questionnaire_id' => 1,
            'question_name' => 'What does HTML stand for?',
            'question_type' => 2,
            'choices' => 'Hypertext Marking Language;Hypertext Tool Management Language;Hypertext Markup Language;Hidden Text-Making Language',
            'answer' => 3,
            'points' => 1
        ]);

        Question::create([
            'questionnaire_id' => 1,
            'question_name' => 'What is the correct HTML element for the largest heading?',
            'question_type' => 1,
            'choices' => null,
            'answer' => '<h1>',
            'points' => 2
        ]);

        Question::create([
            'questionnaire_id' => 1,
            'question_name' => '<br> breaks a line.',
            'question_type' => 3,
            'choices' => null,
            'answer' => 1,
            'points' => 2
        ]);

        Question::create([
            'questionnaire_id' => 1,
            'question_name' => 'Bootstrap is developed by Acme Inc.',
            'question_type' => 3,
            'choices' => null,
            'answer' => 0,
            'points' => 2
        ]);

        Question::create([
            'questionnaire_id' => 1,
            'question_name' => 'What is 1 + 1?',
            'question_type' => 2,
            'choices' => '2;11;2 and 11;None specified',
            'answer' => 3,
            'points' => 2
        ]);

        // Angular Basics
        Question::create([
            'questionnaire_id' => 2,
            'question_name' => 'Angular is developed by ...',
            'question_type' => 1,
            'choices' => null,
            'answer' => 'google',
            'points' => 3
        ]);

        Question::create([
            'questionnaire_id' => 2,
            'question_name' => 'What is Component?',
            'question_type' => 2,
            'choices' => 'A building block of angular;A pipe;An observable;A property of CSS',
            'answer' => 1,
            'points' => 3
        ]);

        Question::create([
            'questionnaire_id' => 2,
            'question_name' => 'Pipe is to transform data?',
            'question_type' => 3,
            'choices' => null,
            'answer' => 1,
            'points' => 3
        ]);

        Question::create([
            'questionnaire_id' => 2,
            'question_name' => 'How to share data between several unknown components? (s...)',
            'question_type' => 1,
            'choices' => null,
            'answer' => 'service',
            'points' => 3
        ]);
    }
}
