<?php

namespace App\Http\Controllers\APIs\Students;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use App\Models\SchoolExam;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentExamResultController extends Controller
{
   // Get All Courses
   public function index(Request $request){

    // IN production ode fetch the class_id from the login of the student from the api response

    $request->validate([
        'classId' => 'required',
        'studentId' => 'required',
        'examType' => 'required'
    ]);
    $result = SchoolExam::select('id', 'class_id', 'subject_id', 'teacher_id', 'obtained_marks', 'total_marks', 
    'percentage', 'grade', 'year')
    ->where('class_id', $request->classId)
    ->where('student_id', $request->studentId)
    ->where('exam_type', $request->examType)
    ->with('student_class:id,name')                               
     ->with('school_subject:id,name')  
     ->with('subject_teacher:id,name') 
    ->get();  


    return response([
        'Student Result' => $result
        
    ], 200);

}

// Get Exam overivew
public function examOverview(Request $request)
{
    $request->validate([
        'classId' => 'required',
        'studentId' => 'required'
    ]);

    $result = SchoolExam::select(
        'class_id',
        'student_id',
        'exam_type',
        DB::raw('SUM(obtained_marks) as total_obtained_marks'),
        DB::raw('SUM(total_marks) as total_marks'),
        DB::raw('SUM(obtained_marks) / SUM(total_marks) * 100 as percentage')
    )
        ->where('class_id', $request->classId)
        ->where('student_id', $request->studentId)
        ->groupBy('class_id', 'student_id', 'exam_type')
        ->with('student_class:id,name')
        ->get();

    return response([
        'Student Result' => $result
    ], 200);
}


}
