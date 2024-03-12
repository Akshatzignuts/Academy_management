<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //this can be used to dsplay teacher form
    public function index()
    {
        return view("academy.teacher");
    }
    //this can be used to  add teacher details
    public function addTeacher(Request $request)
    {

        $request->validate(
            [

                'teacher_name' => 'required',
                'address' => 'required',
                'mobile_no' => 'required|numeric',


            ]
        );

        $teacher = Teacher::create($request->only('teacher_name', 'address', 'mobile_no')
            + ['user_id' => auth()->user()->id]);
        return redirect('/teacher/display');
    }
    //this can be used to  display teacher details
    public function teacherDisplay()
    {
        $user = auth()->user()->id;
        $id = $user;
        $teacher = Teacher::where('user_id', '=', $id)->get();
        return view('academy.teacherdisplay', compact('teacher'));
    }
}
