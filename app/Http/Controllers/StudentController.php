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
    //this can be used to student form 
    public function student()
    {
        $user = auth()->user()->id;
        $id = $user;
        $course = Course::where('user_id', '=', $id)->get();
        $teachers = Teacher::where('user_id', '=', $id)->get();
        return view("student.student", compact('course', 'teachers'));
    }
    //this can be used to add student  
    public function add(Request $request)
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
        return redirect('/student/display')->with('message', 'Student added successfully');
    }
    //this can be used to display all students 
    public function display()
    {
        $user = auth()->user()->id;
        $id = $user;
        $student = Student::with('teacher')->where('user_id', '=', $id)->get();
        return view('student.studentdisplay', compact('student'));
    }
    //this can be used to edit student details
    public function edit(Request $request, $student_id)
    {
        $user = auth()->user()->id;
        $id = $user;
        $course = Course::where('user_id', '=', $id)->get();
        $teachers = Teacher::where('user_id', '=', $id)->get();
        $student = Student::findOrFail($student_id);
        return view('student.editstudent', compact('student', 'course', 'teachers'));
    }
    //this can be used to update student details
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'courses' => 'required|array',
                'name' => 'required',
                'address' => 'required',
                'mobile_no' => 'required|numeric',
                'teacher_id' => 'required'
            ]
        );
        $student = Student::findOrFail($id);
        $student->update($request->only('name', 'address', 'mobile_no', 'teacher_id'));
        $student->courses()->sync($request->courses);
        return redirect('/student/display')->with('message', 'student details updated successfully');
    }
    //this can be used to delete student details
    public function delete($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->back()->with("message", "student deleted successfully");
    }
}
