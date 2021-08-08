<?php

namespace Database\Seeders;

use App\Models\Questionnaire;
use Illuminate\Database\Seeder;

class QuestionnaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Questionnaire::create([
            'questionnaire_name' => 'HTML Basics'
        ]);
        Questionnaire::create([
            'questionnaire_name' => 'Angular Basics'
        ]);
        Questionnaire::create([
            'questionnaire_name' => 'Communication Basics'
        ]);
        Questionnaire::create([
            'questionnaire_name' => 'Powerpoint Basics'
        ]);
        Questionnaire::create([
            'questionnaire_name' => 'How to make a burger'
        ]);
        Questionnaire::create([
            'questionnaire_name' => 'Ball passing'
        ]);
        Questionnaire::create([
            'questionnaire_name' => 'Astronaut and recognization'
        ]);
        Questionnaire::create([
            'questionnaire_name' => 'Apple\'s products'
        ]);
        Questionnaire::create([
            'questionnaire_name' => 'Teamwork is key'
        ]);
        Questionnaire::create([
            'questionnaire_name' => 'Culinary Arts'
        ]);
        Questionnaire::create([
            'questionnaire_name' => 'Sql Basics'
        ]);
        Questionnaire::create([
            'questionnaire_name' => 'Web Development & Internet (Advance)'
        ]);
        Questionnaire::create([
            'questionnaire_name' => 'Bootstrap Advanced'
        ]);
    }
}
