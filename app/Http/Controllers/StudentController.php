<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function addstudent(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'address' => 'required',
                'mobile_no' => 'required|numeric',
            ]
        );
        $student = Student::create($request->only('name', 'address', 'mobile_no', 'course_id')
            + ['user_id' => auth()->user()->id]);
        return redirect()->back()->with('message', 'student added successfully');
    }
    public function display()
    {
        $user = Auth::User();
        $id = $user->id;
        $students = Student::where('user_id', '=', $id)->get();
        return view('academy.student', compact('students'));
    }
}
