<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return view("academy.teacher");
    }
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
    public function teacherDisplay()
    {
        $user = auth()->user()->id;
        $id = $user;
        $teacher = Teacher::where('user_id', '=', $id)->get();
        return view('academy.teacherdisplay', compact('teacher'));
    }
}
