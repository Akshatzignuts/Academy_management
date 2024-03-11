<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function student()
    {
        $user = auth()->user()->id;
        $id = $user;
        $course = Course::where('user_id', '=', $id)->get();
        $teachers = Teacher::where('user_id', '=', $id)->get();
        return view("academy.student", compact('course', 'teachers'));
    }
    public function addStudent(Request $request)
    {

        $request->validate(
            [
                'courses' => 'required|array',
                'name' => 'required',
                'address' => 'required',
                'mobile_no' => 'required|numeric',
                'payment_mode' => 'required',
                'teacher_id' => 'required'
            ]
        );
        $student = Student::create($request->only('name', 'address', 'mobile_no', 'teacher_id')
            + ['user_id' => auth()->user()->id]);
        $student->courses()->attach($request->courses);

        $payment = Payment::create($request->only('payment_mode') + ['student_id' => $student->id]);
        return redirect('/students/')->with('message', 'data inserted successfully');
    }
    public function studentDisplay()
    {
        $user = auth()->user()->id;
        $id = $user;
        $student = Student::with('teacher')->where('user_id', '=', $id)->get();
        return view('academy.studentdisplay', compact('student'));
    }
    public function payment()
    {
        return view("academy.payment");
    }
}
