<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Student;
use App\Models\Payment;
use Illuminate\Http\Request;

class AcademyController extends Controller
{
    public function course()
    {
        return view("academy.course");
    }
    public function viewCourse()
    {
        $user = auth()->user()->id;
        $id = $user;
        $courses = Course::where('user_id', '=', $id)->get();
        return view("academy.viewcourse", compact('courses'));
    }

    //this can be used to add course
    public function addCourse(Request $request)
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
    //this can be used to add display course
    public function display()
    {
        $user = auth()->user()->id;
        $id = $user;
        $course = Course::where('user_id', '=', $id)->get();

        return view('dashboard', compact('course'));
    }
    //this can be used to delete course
    public function delete($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->back()->with('message', 'course deleted successfully');
    }
    //this can be used to edit course
    public function editCourse(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        return view('academy.editcourse', compact('course'));
    }
    //this can be used to update course
    public function updateCourse(Request $request, $id)
    {
        $request->validate([
            'course_name' => 'required',
            'description' => 'required',
            'course_price' => 'required',
            'course_time' => 'required',
        ]);

        $course = Course::findOrFail($id);
        $course->update($request->only('course_name', 'description', 'course_price', 'course_time'));
        return redirect('/dashboard');
    }
}