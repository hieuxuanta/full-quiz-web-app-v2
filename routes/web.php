<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(); //Authentication routes, predefined by Laravel

Route::get('/', [QuizController::class, 'Home']); //Returns the home page

//TODO: about us, home, contact page

Route::get('/panel', [QuizController::class, 'RedirectToAppropriatePanel']); //Redirect to appropriate panel

Route::resource('quiz', 'QuizEventController', ['only' => [//Quiz Events
    'create', 'store', 'show', 'update'
]]);

Route::resource('take', 'TakeQuizController', ['only' => [//Related to taking of quiz
    'store', 'show'
]]);

Route::resource('class', 'ClassController',  ['only' => [//Class
    'store', 'show', 'destroy'
]]);

Route::resource('question', 'QuestionController', ['only' => [//Question
    'store', 'update',  'destroy',
]]);

Route::resource('subjects', 'SubjectController', ['only' => [//Subject
    'index', 'store', 'update', 'destroy'
]]);

Route::resource('teachers', 'TeacherController', ['only' => [//Teacher list
    'index'
]]);

Route::resource('account', 'AccountController', ['only' => [//Account management
    'store', 'update', 'destroy'
]]);

Route::resource('questionnaire', 'QuestionnaireController', ['only' => [//Questionnaire
    'show',
]]);

Route::post('join', 'QuizController@JoinClass');

// Route::get('/', [HomeController::class, 'index']);
// Route::get('/', function () {
//     return view('welcome');
// });
