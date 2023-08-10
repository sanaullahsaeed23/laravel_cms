<?php

namespace App\Http\Controllers\APIs\Students;

use App\Http\Controllers\Controller;
use App\Models\HomeWork;
use App\Models\SchoolSubject;
use Illuminate\Http\Request;

class StudentHomeWorkController extends Controller
{
   // Get All Courses
   public function index(Request $request){

    // IN production ode fetch the class_id from the login of the student from the api response

    $request->validate([
        'classId' => 'required',
        'subjectId' => 'required|int'
    ]);
    $homeWork = HomeWork::where('class_id', $request->classId)
                        ->where('subject_id', $request->subjectId)
                            ->with('student_class:id,name')
                            ->with('subject_name:id,name')            
                            ->with('subject_teacher:id,name')
                            ->orderBy('created_at', 'DESC')
                            ->get();  

    return response([
        'HomeWork Assigned' => $homeWork
    ], 200);

}

public function getSubjects(Request $request){
    $request->validate([
        'classId' => 'required'
    ]);
    $subjects = SchoolSubject::select('id', 'name')->where('class_id', $request->classId)
                            ->get();  
    return response([
        'Subjects' => $subjects
    ], 200);
}


public function homeworkAssignedDetails(Request $request){
    $request->validate([
        'homeworkId' => 'required' /// 'id' column of the database table
    ]);
    $homeWorkDetials = HomeWork::where('id', $request->homeworkId)
                            ->with('student_class:id,name')
                            ->with('subject_name:id,name')            
                            ->with('subject_teacher:id,name')
                            ->get();  

    return response([
        'Assigned HomeWork Details' => $homeWorkDetials
    ], 200);
}

}
