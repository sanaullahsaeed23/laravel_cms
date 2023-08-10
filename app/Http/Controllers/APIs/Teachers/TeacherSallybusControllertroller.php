<?php

namespace App\Http\Controllers\APIs\Teachers;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use Illuminate\Http\Request;

class TeacherSallybusControllertroller extends Controller
{
  // Get All Courses
  public function index(Request $request){

    // IN production ode fetch the class_id from the login of the student from the api response

    $request->validate([
        'teacher_id' => 'required'
    ]);
    $subjectsTeacher = AssignSubject::where('teacher_id', $request->teacher_id)
    ->with('student_class:id,name')                               
     ->with('school_subject:id,name')  
     ->with('subject_teacher:id,name')                             
    ->get();

    

    // $teacherNames = $subjectsTeacher->map(function ($teacherName) {
    //     return $teacherName->subject_teacher->name;
    // });

    return response([
        'Subject Assigned' => $subjectsTeacher,
    ], 200);

}
}
