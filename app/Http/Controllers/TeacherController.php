<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //this can be used to dsplay teacher form
    public function index()
    {
        return view("teacher.teacher");
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
        return redirect('/teacher/display')->with('message', 'Teacher added Successfully');
    }
    //this can be used to  display teacher details
    public function teacherDisplay()
    {
        $user = auth()->user()->id;
        $id = $user;
        $teacher = Teacher::where('user_id', '=', $id)->get();
        return view('teacher.teacherdisplay', compact('teacher'));
    }
    public function editTeacher(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        return view('teacher.editteacher', compact('teacher'));
    }
    public function updateTeacher(Request $request, $id)
    {
        $request->validate(
            [
                'teacher_name' => 'required',
                'address' => 'required',
                'mobile_no' => 'required|numeric',
            ]
        );
        $teacher = Teacher::find($id);
        $teacher->update($request->only('teacher_name', 'address', 'mobile_no')
            + ['user_id' => auth()->user()->id]);
        return redirect('/teacher/display')->with('message', 'Teacher edited Successfully');
    }
    public function deleteTeacher($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return redirect()->back()->with("message", "teacher deleted successfully");
    }
}
