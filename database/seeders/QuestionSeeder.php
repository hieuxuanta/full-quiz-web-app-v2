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
        /**
         * question_type:
         * 1 - Identification
         * 2 - Multiple choices
         * 3 - True/False
         *
         * choices:
         * - Only on multiple choices question_type
         */
        // HTML Basics
        Question::insert([
            [
                'questionnaire_id' => 1,
                'question_name' => 'What does HTML stand for?',
                'question_type' => 2,
                'choices' => 'Hypertext Marking Language;Hypertext Tool Management Language;Hypertext Markup Language;Hidden Text-Making Language',
                'answer' => 3,
                'points' => 1
            ],
            [
                'questionnaire_id' => 1,
                'question_name' => 'What is the correct HTML element for the largest heading?',
                'question_type' => 1,
                'choices' => null,
                'answer' => '<h1>',
                'points' => 2
            ],
            [
                'questionnaire_id' => 1,
                'question_name' => '<br> breaks a line.',
                'question_type' => 3,
                'choices' => null,
                'answer' => 1,
                'points' => 2
            ],
            [
                'questionnaire_id' => 1,
                'question_name' => 'Bootstrap is developed by Acme Inc.',
                'question_type' => 3,
                'choices' => null,
                'answer' => 0,
                'points' => 2
            ],
            [
                'questionnaire_id' => 1,
                'question_name' => 'What is 1 + 1?',
                'question_type' => 2,
                'choices' => '2;11;2 and 11;None specified',
                'answer' => 3,
                'points' => 2
            ]
        ]);

        // Angular Basics
        Question::insert([
            [
                'questionnaire_id' => 2,
                'question_name' => 'Angular is developed by ...',
                'question_type' => 1,
                'choices' => null,
                'answer' => 'google',
                'points' => 1
            ],
            [
                'questionnaire_id' => 2,
                'question_name' => 'What is Component?',
                'question_type' => 2,
                'choices' => 'A building block of angular;A pipe;An observable;A property of CSS',
                'answer' => 1,
                'points' => 5
            ],
            [
                'questionnaire_id' => 2,
                'question_name' => 'Pipe is to transform data?',
                'question_type' => 3,
                'choices' => null,
                'answer' => 1,
                'points' => 3
            ],
            [
                'questionnaire_id' => 2,
                'question_name' => 'How to share data between several unknown components? (s...)',
                'question_type' => 1,
                'choices' => null,
                'answer' => 'service',
                'points' => 2
            ]
        ]);

        // Sql Basics
        Question::insert([
            [
                'questionnaire_id' => 11,
                'question_name' => 'What does SQL stand for?',
                'question_type' => 2,
                'choices' => 'Strong Question Language;Structured Question Language;Structured Query Language;None of the above',
                'answer' => 3,
                'points' => 2
            ],
            [
                'questionnaire_id' => 11,
                'question_name' => 'Which SQL statement is used to extract data from a database?',
                'question_type' => 2,
                'choices' => 'EXTRACT;SELECT;GET;OPEN',
                'answer' => 2,
                'points' => 2
            ],
            [
                'questionnaire_id' => 11,
                'question_name' => 'Which SQL statement is used to delete data from a database?',
                'question_type' => 2,
                'choices' => 'REMOVE;DELETE;COLLAPSE;Another answer',
                'answer' => 2,
                'points' => 1
            ],
            [
                'questionnaire_id' => 11,
                'question_name' => 'Which SQL statement is used to insert new data in a database?',
                'question_type' => 1,
                'choices' => null,
                'answer' => 'INSERT INTO',
                'points' => 1
            ],
            [
                'questionnaire_id' => 11,
                'question_name' => 'How do you select all the columns from a table named \'Persons\'?',
                'question_type' => 2,
                'choices' => 'SELECT all FROM Persons;SELECT Persons;SELECT * FROM Persons;SELECT *.Persons',
                'answer' => 3,
                'points' => 3
            ],
            [
                'questionnaire_id' => 11,
                'question_name' => "To select all the records from a table named 'Persons' where the value of the column 'FirstName' is 'Peter', we use this command: SELECT * FROM Persons WHERE FirstName='Peter'",
                'question_type' => 3,
                'choices' => null,
                'answer' => 1,
                'points' => 4
            ],
            [
                'questionnaire_id' => 11,
                'question_name' => 'With SQL, how do you select all the records from a table named "Persons" where the "LastName" is alphabetically between (and including) "Hansen" and "Pettersen"?',
                'question_type' => 2,
                'choices' => "SELECT * FROM Persons WHERE LastName BETWEEN 'Hansen' AND 'Pettersen';SELECT * FROM Persons WHERE LastName>'Hansen' AND LastName<'Pettersen';SELECT LastName>'Hansen' AND LastName<'Pettersen' FROM Persons;All of the above",
                'answer' => 1,
                'points' => 7
            ],
            [
                'questionnaire_id' => 11,
                'question_name' => 'Which SQL statement is used to return only different values?',
                'question_type' => 1,
                'choices' => null,
                'answer' => 'SELECT DISTINCT',
                'points' => 3
            ],
            [
                'questionnaire_id' => 11,
                'question_name' => "'ORDER BY' is SQL keyword which is used to sort the result-set?",
                'question_type' => 3,
                'choices' => null,
                'answer' => 1,
                'points' => 2
            ],
            [
                'questionnaire_id' => 11,
                'question_name' => "In SQL, you can return the number of records in the 'Persons' table by str_len(*)",
                'question_type' => 3,
                'choices' => null,
                'answer' => 2,
                'points' => 4
            ],
        ]);

        // Web Development & Internet (Advance)
        Question::insert([
            [
                'questionnaire_id' => 12,
                'question_name' => 'How many web development stages are there?',
                'question_type' => 2,
                'choices' => '1. Discovery - 2. Planning - 3. Design - 4. Development - 5. Delivery - 6.Maintenance;1. Daily meeting - 2. Development;1. Tesing - 2. Planning - 3. Development;Only development is needed',
                'answer' => 1,
                'points' => 5
            ],
            [
                'questionnaire_id' => 12,
                'question_name' => 'They design and produce animation, digital video and audio, 2D and 3D models, and other media elements to include in a website. Who are they?',
                'question_type' => 2,
                'choices' => 'Multimedia Developer.;Web Programmer;Webmaster;Administration',
                'answer' => 1,
                'points' => 4
            ],
            [
                'questionnaire_id' => 12,
                'question_name' => 'A ________ must be highly skilled in advanced programming languages, such as practical Extraction and Report Language, jave, Javascript, and Virtual Reality Modeling Language.',
                'question_type' => 2,
                'choices' => 'Writer;Web Reader;Web Page Designer;Web Programmer.',
                'answer' => 4,
                'points' => 2
            ],
            [
                'questionnaire_id' => 12,
                'question_name' => 'As a Multimedia Developer, you create and revise the text that visitors read when they visit a website. Is this true?',
                'question_type' => 3,
                'choices' => null,
                'answer' => 2,
                'points' => 3
            ],
            [
                'questionnaire_id' => 12,
                'question_name' => 'What organization does domain "COM" represents for?',
                'question_type' => 1,
                'choices' => null,
                'answer' => 'Commercial',
                'points' => 6
            ],
            [
                'questionnaire_id' => 12,
                'question_name' => 'What organization does domain "gov" represents for?',
                'question_type' => 1,
                'choices' => null,
                'answer' => 'Government Institution',
                'points' => 6
            ],
            [
                'questionnaire_id' => 12,
                'question_name' => 'It is specific software programs that allows to display the web pages.',
                'question_type' => 2,
                'choices' => 'Printer;Adobe After Effect;Web browser.;Geforce Experience',
                'answer' => 3,
                'points' => 3
            ]

        ]);

        // Bootstrap Basics
        Question::insert([
            [
                'questionnaire_id' => 13,
                'question_name' => "The .container class provides a full width container, spanning the entire width of the screen",
                'question_type' => 3,
                'choices' => null,
                'answer' => 2,
                'points' => 1
            ],
            [
                'questionnaire_id' => 13,
                'question_name' => "Which class provides a responsive fixed width container?",
                'question_type' => 1,
                'choices' => null,
                'answer' => '.container',
                'points' => 2
            ],
            [
                'questionnaire_id' => 13,
                'question_name' => "The Bootstrap grid system works across multiple devices.",
                'question_type' => 3,
                'choices' => null,
                'answer' => 1,
                'points' => 2
            ],
            [
                'questionnaire_id' => 13,
                'question_name' => "Which attribute is used to create a tooltip?",
                'question_type' => 2,
                'choices' => 'data-toggle="tooltip".;data-toggle="popup";data-toggle="modal";data-toggle="collapse"',
                'answer' => 1,
                'points' => 4
            ],
            [
                'questionnaire_id' => 13,
                'question_name' => "Which component is used to cycle through elements, like a slideshow?",
                'question_type' => 2,
                'choices' => 'Carousel;Orbit;Slideshow;Scrollspy',
                'answer' => 1,
                'points' => 1
            ],
            [
                'questionnaire_id' => 13,
                'question_name' => "Class is used to create a vertical navigation bar: ...",
                'question_type' => 1,
                'choices' => null,
                'answer' => '.navbar',
                'points' => 3
            ],
            [
                'questionnaire_id' => 13,
                'question_name' => "A standard navigation bar is created with:",
                'question_type' => 2,
                'choices' => '<nav class="navigationbar navbar-default">;<nav class="nav navbar">;<nav class="navbar navbar-default">;<nav class="navbar navbar-expand-sm">.',
                'answer' => 4,
                'points' => 6
            ],
            [
                'questionnaire_id' => 13,
                'question_name' => "Class '.dropdownn' indicates a dropdown menu.",
                'question_type' => 3,
                'choices' => null,
                'answer' => 2,
                'points' => 1
            ],
            [
                'questionnaire_id' => 13,
                'question_name' => "Which class adds a heading to a card?",
                'question_type' => 2,
                'choices' => '.card-header.;.card-heading;.card-head;.card-footer',
                'answer' => 1,
                'points' => 4
            ],
            [
                'questionnaire_id' => 13,
                'question_name' => "To create a loader, we use class ...",
                'question_type' => 2,
                'choices' => '.spinner-loader;.loader;.spinner-border.;.spinner',
                'answer' => 3,
                'points' => 5
            ],
        ]);
    }
}
