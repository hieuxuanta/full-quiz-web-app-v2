<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Facade\FlareClient\Http\Response;
use Faker\Core\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created class in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedRequest = $request->validate([
            'course_sec' => 'required|min:3|max:50|regex:/^[a-zA-Z\s]+[0-9]*$/u',
            'sub_id' => 'required|integer',
        ]);

        $i_id = Auth::user()->usr_id; //gets the id of the user
        $course_sec = $validatedRequest['course_sec'];
        $sub_id = $validatedRequest['sub_id'];
        $class_id = Self::generateClassId($course_sec);
        // $class_id = $request->input('class_id');

        if (Classe::where('class_id', $class_id)->first()) {
            dd("This class id existed. Try another code, thanks!");
        } else {
            Classe::create([
                'class_id' => $class_id,
                'instructor_id' => $i_id,
                'course_sec' => $course_sec,
                'subject_id' => $sub_id,
                'class_active' => true,
            ]);

            return redirect('/panel');
        }

    }

    /**
     * Generate class id by rules: First 3 uppercase letters of course_sec + 5 random number from 10000-99999
     * No special characters include
     *
     * @param $courseSec: Name of the class
     * @return $classId: Generated class id
     */
    public function generateClassId($courseSec)
    {
        $classId = strtoupper(substr($courseSec, -strlen($courseSec), 3)) . mt_rand(10000, 99999);

        if (Classe::where('class_id', $classId)->exists())
        {
            generateClassId($courseSec);
        }

        return $classId;
    }

    /**
     * Displays a specified class.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz_events = DB::table('quiz_events')
            ->join('classes', 'quiz_events.class_id', '=', 'classes.class_id')
            ->join('subjects', 'subjects.subject_id', '=', 'classes.subject_id')
            ->where('classes.class_id', $id)
            ->get();

        $quiz_class = Classe::with('subject')
            ->where('instructor_id', Auth::user()->usr_id)
            ->where('class_id', $id)
            ->first();

        $students = DB::table('student_classes')
            ->join('user_profiles', 'student_classes.student_id', '=', 'user_profiles.usr_id')
            ->where('class_id', $id)
            ->orderBy('full_name', 'asc')
            ->get();

        return view('manage.classes', compact('students', 'quiz_class', 'quiz_events'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Classe::destroy($id);
    }
}
