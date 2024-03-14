<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;
use App\Models\Course;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //this can be used to student form 
    public function student()
    {
        $user = auth()->user()->id;
        $id = $user;
        $course = Course::where('user_id', '=', $id)->get();
        $teachers = Contact::where('user_id', '=', $id)->where('user_type', '=', 'teacher')->get();
        return view("student.student", compact('course', 'teachers'));
    }
    public function index()
    {
        return view("teacher.teacher");
    }
    //this can be used to add student and teacher both  
    public function add(Request $request)
    {
        $userType = $request->input('user_type');
        if ($userType == 'student') {
            $request->validate(
                [
                    'user_type' => 'required',
                    'courses' => 'required|array',
                    'name' => 'required',
                    'address' => 'required',
                    'mobile_no' => 'required|numeric',
                    'payment_mode' => 'required',
                    'teacher_assigned' => 'required'
                ]
            );
            $student = Contact::create($request->only('name', 'address', 'mobile_no', 'user_type', 'teacher_assigned')
                + ['user_id' => auth()->user()->id]);
            $student->courses()->attach($request->courses);
            $payment = Payment::create($request->only('payment_mode') + ['student_id' => $student->id]);
            return redirect('/student/display')->with('message', 'Student added successfully');
        } else {
            $request->validate(
                [

                    'name' => 'required',
                    'address' => 'required',
                    'mobile_no' => 'required|numeric',
                    'user_type' => 'required'

                ]
            );
            $teacher = Contact::create($request->only('name', 'address', 'mobile_no', 'user_type')
                + ['user_id' => auth()->user()->id]);
            return redirect('/teacher/display')->with('message', 'Teacher added Successfully');
        }
    }
    //this can be used to display all students 
    public function displayStudent()
    {
        $user = auth()->user()->id;
        $id = $user;
        $student = Contact::where('user_id', '=', $id)->where('user_type', '=', 'student')->get();
        return view('student.studentdisplay', compact('student'));
    }
//this can be used to display all teacher 
    public function displayTeacher()
    {
        $user = auth()->user()->id;
        $id = $user;
        $teacher = Contact::where('user_id', '=', $id)->where('user_type', '=', 'teacher')->get();
        return view('teacher.teacherdisplay', compact('teacher'));
    }

    //this can be used to edit student details and teacher detail
    public function edit(Request $request, $contact_id)
    {

        $user = auth()->user()->id;
        $id = $user;
        $contact = Contact::findOrFail($contact_id);
        if ($contact->user_type == 'student') {
            $course = Course::where('user_id', '=', $id)->get();
            $teachers = Contact::where('user_id', '=', $id)->where('user_type', '=', 'teacher')->get();
            return view('student.editstudent', compact('contact', 'course', 'teachers'));
        } else {
            return view('teacher.editteacher', compact('contact'));
        }
    }
    //this can be used to update student details and teacher detail
    public function update(Request $request, $id)
    {
        $userType = $request->input('user_type');

        if ($userType == 'student') {
            $request->validate(
                [
                    'courses' => 'required|array',
                    'name' => 'required',
                    'address' => 'required',
                    'mobile_no' => 'required|numeric',
                    'teacher_assigned' => 'required'
                ]
            );
            $student = Contact::findOrFail($id);
            $student->update($request->only('name', 'address', 'mobile_no', 'teacher_assigned'));
            $student->courses()->sync($request->courses);
            return redirect('/student/display')->with('message', 'student details updated successfully');
        } else {
            $request->validate(
                [
                    'name' => 'required',
                    'address' => 'required',
                    'mobile_no' => 'required|numeric',
                ]
            );
            $teacher = Contact::find($id);
            $teacher->update($request->only('name', 'address', 'mobile_no')
                + ['user_id' => auth()->user()->id]);
            return redirect('/teacher/display')->with('message', 'Teacher edited Successfully');
        }
    }
    //this can be used to delete student details and teacher detail
    public function delete($id)
    {
        $contact = Contact::findOrFail($id);
        if ($contact->user_type == 'student') {
            $contact->delete();
            return redirect()->back()->with("message", "student deleted successfully");
        } else {
            $contact->delete();
            return redirect()->back()->with("message", "teacher deleted successfully");
        }
    }
}