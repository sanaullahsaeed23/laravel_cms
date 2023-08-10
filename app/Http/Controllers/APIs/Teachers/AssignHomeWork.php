<?php

namespace App\Http\Controllers\APIs\Teachers;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use App\Models\HomeWork;
use App\Models\SchoolSubject;
use Illuminate\Http\Request;

class AssignHomeWork extends Controller
{

    public function getSubjects(Request $request){
        $request->validate([
            'teacherId' => 'required'
        ]);
        $subjects = AssignSubject::select('id', 'teacher_id', 'subject_id', 'class_id')
        ->with('school_subject:id,name')
        ->with('student_class:id,name')
        ->where('teacher_id', $request->teacherId)
                                ->get();  
        return response([
            'Subjects' => $subjects
        ], 200);
    }

    public function assignTask(Request $request){
        $attrs = $request->validate([
            'classId' => 'required|int',
            'subjectId' => 'required|int',
            'teacherId' => 'required|int',
            'taskTitle' => 'required|string',
            'taskDescription' => 'required|string',
            'submissionDate' => 'required|date'
        ]);

        $homeWork = HomeWork::create([
            'class_id' => $attrs['classId'],
            'subject_id' => $attrs['subjectId'],
            'teacher_id' => $attrs['teacherId'],
            'topic_name' => $request->topicName,
            'task_title' => $attrs['taskTitle'],
            'task_description' => $attrs['taskDescription'],
            'submission_date' => $attrs['submissionDate'],

           //todo: implement current user id as teacher id // 'user_id' => auth()->user()->id, 
            // 'image' => $image
        ]);

        // response
        return response([
            'message' => 'HomeWork created Successfully !!',
            'homeWork' => $homeWork
        ], 200);
    }

    public function getHomeWorks(Request $request){
        // IN production ode fetch the class_id from the login of the student from the api response
        $request->validate([
            'classId' => 'required',
            'subjectId' => 'required',
            'teacherId' => 'required'
        ]);
        $homeWork = HomeWork::where('class_id', $request->classId)
                            ->where('subject_id', $request->subjectId)
                            ->where('teacher_id', $request->teacherId)
                                ->with('student_class:id,name')
                                ->with('subject_name:id,name')            
                                ->with('subject_teacher:id,name')
                                ->orderBy('created_at', 'DESC')
                                ->get();  
    
        return response([
            'HomeWork Assigned' => $homeWork
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
