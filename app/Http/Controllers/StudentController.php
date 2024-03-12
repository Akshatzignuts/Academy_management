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
        //dd($payment);
        return redirect('/student/display')->with('message', 'data inserted successfully');
    }
    //this can be used to display all students 
    public function studentDisplay()
    {

        $user = auth()->user()->id;
        $id = $user;
        $student = Student::with('teacher')->where('user_id', '=', $id)->get();
        return view('student.studentdisplay', compact('student'));
    }
    //this can be used to edit student details
    public function editStudent(Request $request, $ids)
    {
        $user = auth()->user()->id;
        $id = $user;
        $course = Course::where('user_id', '=', $id)->get();
        $teachers = Teacher::where('user_id', '=', $id)->get();

        $student = Student::findOrFail($ids);
        return view('student.editstudent', compact('student', 'course', 'teachers'));
    }
    //this can be used to update student details
    public function updateStudent(Request $request, $id)
    {
        //dd($request->all());
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
        $student = Student::findOrFail($id);
        $student->update($request->only('name', 'address', 'mobile_no', 'teacher_id'));
        $student->courses()->sync($request->courses);

        $payment = Payment::create($request->only('payment_mode') + ['student_id' => $student->id]);
        //dd($payment);
        return redirect('/student/display')->with('message', 'data inserted successfully');
    }
    //this can be used to delete student details
    public function deleteStudent($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->back()->with("message", "student deleted successfully");
    }
}
