<?php

use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizEventController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
 */

Auth::routes(); //Authentication routes, predefined by Laravel

Route::get('/', [QuizController::class, 'Home']); //Returns the home page

Route::get('/instruction', function () { //Returns the instruction page
    return view('instruction');
});

Route::get('/panel', [QuizController::class, 'RedirectToAppropriatePanel']); //Redirect to appropriate panel

Route::get('download-result', [QuizEventController::class, 'createPDF']);

Route::resource('quiz', 'QuizEventController', ['only' => [ //Quiz Events
    'create', 'store', 'show', 'update',
]]);

Route::resource('take', 'TakeQuizController', ['only' => [ //Related to taking of quiz
    'store', 'show',
]]);

Route::resource('class', 'ClassController', ['only' => [ //Class
    'store', 'show', 'destroy',
]]);

Route::resource('question', 'QuestionController', ['only' => [ //Question
    'store', 'update', 'destroy',
]]);

Route::resource('subjects', 'SubjectController', ['only' => [ //Subject
    'index', 'store', 'update', 'destroy',
]]);

Route::resource('teachers', 'TeacherController', ['only' => [ //Teacher list
    'index',
]]);

Route::resource('account', 'AccountController', ['only' => [ //Account management
    'store', 'update', 'destroy',
]]);

Route::resource('questionnaire', 'QuestionnaireController', ['only' => [ //Questionnaire
    'show',
]]);

Route::post('join', 'QuizController@JoinClass');
