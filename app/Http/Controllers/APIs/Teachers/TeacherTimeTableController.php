<?php

namespace App\Http\Controllers\APIs\Teachers;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use Illuminate\Http\Request;

class TeacherTimeTableController extends Controller
{
   // Get All Courses
   public function index(Request $request){

    // IN production ode fetch the class_id from the login of the student from the api response

    $request->validate([
        'teacherId' => 'required|int',
        'day' => 'required',
        'year' => 'required|date'
    ]);
    $timeTable = AssignSubject::select('id', 'class_id', 'subject_id', 'teacher_id', 'day', 'year', 
    'start_Time', 'end_Time')
    ->where('teacher_id', $request->teacherId)
    ->where('day', $request->day)
    ->whereYear('year', $request->year)
    ->with('student_class:id,name')                               
     ->with('school_subject:id,name')  
     ->with('subject_teacher:id,name') 
    ->get();  

    // Fetch specific data
    // $responseData = $timeTable->map(function ($row) {
    //     return [
    //         'student_class' => $row->student_class->name,
    //         // 'school_subject' => $row->school_subject,
    //         // 'subject_teacher' => $row->subject_teacher->name, // Fetch only the name attribute
    //     ];
    // });

    return response([
        'Teacher TimeTable' => $timeTable
    ], 200);

}
}
