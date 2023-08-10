<?php

namespace App\Http\Controllers\APIs\Students;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use Illuminate\Http\Request;

class StudentSallybusController extends Controller
{
   // Get All Courses
   public function index(Request $request){

    // IN production ode fetch the class_id from the login of the student from the api response

    $request->validate([
        'class_id' => 'required'
    ]);
    $subjectsClass = AssignSubject::where('class_id', $request->class_id)
    ->with('student_class:id,name')                               
     ->with('school_subject:id,name')  
     ->with('subject_teacher:id,name') 
    ->get();  

    return response([
        'Subjects List' => $subjectsClass
    ], 200);

}
}
