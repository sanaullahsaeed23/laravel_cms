<?php

namespace App\Http\Controllers\APIs\Students;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentTimeTableController extends Controller
{
   // Get All Courses
   public function index(Request $request){

    // IN production ode fetch the class_id from the login of the student from the api response

    $request->validate([
        'classId' => 'required',
        'day' => 'required',
        'year' => 'required|date'
    ]);
    $timeTable = AssignSubject::select('id', 'class_id', 'subject_id', 'teacher_id', 'day', 'year', 
    'start_Time', 'end_Time')
    ->where('class_id', $request->classId)
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
        'Student TimeTable' => $timeTable
        
    ], 200);

}
}
