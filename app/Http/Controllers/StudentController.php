<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function addStudent(Request $request)
    {
        dd($request->all());
        $request->validate(
            [
                'name' => 'required',
                'address' => 'required',
                'mobile_no' => 'required|numeric',
                'payment_mode' => 'required'
            ]
        );
        $student = Student::create($request->only('name', 'address', 'mobile_no', 'course_id')
            + ['user_id' => auth()->user()->id]);

        $payment = Payment::create($request->only('payment_mode', 'course_id') + ['student_id' => $student->id]);
        return redirect('/students/');
    }
    public function studentDisplay()
    {
        $user = auth()->user()->id;
        $id = $user;
        $student = Student::where('user_id', '=', $id)->get();
        return view('academy.studentdisplay', compact('student'));
    }
    public function payment()
    {
        return view("academy.payment");
    }
}
