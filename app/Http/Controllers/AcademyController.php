<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class AcademyController extends Controller
{
    public function course()
    {
        return view("academy.courses");
    }
    public function student($course_id)
    {
        return view("academy.student", compact('course_id'));
    }
    public function addcourse(Request $request)
    {
        $request->validate(
            [
                'course_name' => 'required',
                'description' => 'required',
                'course_time' => 'required',
                'course_price' => 'required|integer|min:0'
            ]
        );
        $course = Course::create($request->only('course_name', 'description', 'course_time', 'course_price')
            + ['user_id' => auth()->user()->id]);
        return redirect('/dashboard')->with('message', 'Course added successfully');
    }


    public function display()
    {

        $user = Auth::User();
        $id = $user->id;
        $course = Course::where('user_id', '=', $id)->get();
        return view('dashboard', compact('course'));
    }
   
 
}