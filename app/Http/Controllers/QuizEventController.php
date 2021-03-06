<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Question;
use App\Models\Questionnaire;
use App\Models\QuizEvent;
use App\Models\QuizStudentScore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class QuizEventController extends Controller
{
    public $tempResults;

    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the form for creating a new quiz event.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::user()->usr_id;
        // $classes = Classe::all();
        if ($id && Auth::check() && Auth::user()->permissions == 1) {
            $classes = Classe::where('instructor_id', $id)
                ->get();

            return view('create.quiz-event', compact('classes'));
        }
        return abort(403, 'Only teachers can add quiz-events for their own classes!');
    }

    /**
     * Store a newly created quiz event in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quiz_name = $request->input('q_name');
        $class_code = $request->input('class_id');

        $questions = $request->input('question'); //Question
        $types = $request->input('qt'); //Question types

        $i = $request->input('i'); //Correct answer for identification
        $mc = $request->input('mc'); //Choices for multiple choice
        $c_mc = $request->input('c-mc'); //Correct choice
        $tf = $request->input('tf'); //Correct answer for true or false

        $p = $request->input('points'); //Question point

        Questionnaire::create([
            'questionnaire_name' => $quiz_name,
        ]);

        $q_id = Questionnaire::count(); //Questionnaire id.

        for ($x = 0; $x < count($questions); $x++) {
            $question = $questions[$x];
            $choices = ""; //For multiple choice use.
            $answer = null; //Obviously.
            $points = $p[$x];

            if ($types[$x] == 0) {
                //ERROR
            } else if ($types[$x] == 1) { //Identification
                $answer = $i[$x];
            } else if ($types[$x] == 2) { //Multiple choice
                $choices = $mc[$x][0] . ";" . $mc[$x][1] . ";" . $mc[$x][2] . ";" . $mc[$x][3];
                $answer = $c_mc[$x];
            } else if ($types[$x] == 3) { //True or False
                $answer = $tf[$x];
            }

            if (trim($question) == "" || is_null($question)) {
                continue;
            }

            Question::create([
                'questionnaire_id' => $q_id,
                'question_name' => $question,
                'question_type' => $types[$x],
                'choices' => $choices,
                'answer' => $answer,
                'points' => $points,
            ]);
        }

        QuizEvent::create([
            'quiz_event_name' => $quiz_name,
            'questionnaire_id' => $q_id,
            'class_id' => $class_code,
            'quiz_event_status' => 0,
        ]);
// don't change new quiz event status so as to make a clear view
        return redirect('/panel');
    }

    /**
     * Displays the specified quiz event.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->permissions < 2) {
            $usr_id = Auth::user()->usr_id;

            $quiz_details = QuizEvent::with([
                'classe',
                'classe.subject',
                'questionnaire'])
                ->where('quiz_event_id', $id)
                ->first();

            $results = QuizEvent::with([
                'classe.student_class.student_score' => function ($q) use ($id) {
                    $q->where('quiz_event_id', $id);
                },
                'classe.student_class.user_profile'])
                ->where('quiz_event_id', $id)
                ->first();

            $qtn_id = QuizEvent::find($id)->questionnaire_id;
            $sum = Question::where('questionnaire_id', $qtn_id)->sum('points');

            return view('manage.quiz', compact('quiz_details', 'results', 'sum'));
        } else {
            $results = QuizStudentScore::with('quiz_event', 'user_profile')
                ->where('student_id', Auth::user()->usr_id)
                ->first();

            setcookie("cookieSaveResults", $results, time() + (86400 * 30), "/");
            $qtn_id = QuizEvent::find($id)->questionnaire_id;
            $sum = Question::where('questionnaire_id', $qtn_id)->sum('points');

            return view('quiz.results', compact('results', 'sum'));
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $quiz = QuizEvent::find($id);
        $quiz->quiz_event_status = $request->input('quiz_status');
        $quiz->save();
        //return "ID: $id" . "\n" . $request->input('quiz_status');
    }

    /**
     * Generate PDF file and download
     */
    public function createPDF()
    {
        $results = '';
        $id = '';
        // $results = QuizStudentScore::with('quiz_event', 'user_profile')
        //         ->where('student_id', Auth::user()->usr_id)
        //         ->first();
        if (isset($_COOKIE['cookieSaveResults'])) {
            $results = $_COOKIE['cookieSaveResults'];
            $results = json_decode($results);
        }

        if (isset($_COOKIE['cookieSaveId'])) {
            $id = $_COOKIE['cookieSaveId'];
        }

        $qtn_id = QuizEvent::find($id)->questionnaire_id;
        $sum = Question::where('questionnaire_id', $qtn_id)->sum('points');

        // $pdf = PDF::loadView('home', compact('results', 'sum'));

        // return $pdf->download('result.pdf');
    }
}
