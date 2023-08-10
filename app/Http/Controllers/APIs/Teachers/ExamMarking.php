<?php

namespace App\Http\Controllers\APIs\Teachers;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use App\Models\ExamType;
use App\Models\HomeWork;
use App\Models\SchoolExam;
use App\Models\students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ExamMarking extends Controller
{

     // Get the attendace report of teachers marked by admin
   public function subjectsByClassAndTeacher(Request $request){

    $request->validate([
         'classId' => 'required|int',
         'teacherId' => 'required|int'
     ]);
 
     $allStudents = AssignSubject::where('class_id', $request->classId)
     ->where('teacher_id', $request->teacherId)->get();
 
     // $attendanceData = EmployeeAttendance::find($id);
 
     return response([
         'SubjectsByClass&Teacher' => $allStudents
     ], 200);
}

public function subjectsByTeacher(Request $request){

    $request->validate([
         'teacherId' => 'required|int'
     ]);
 
     $allSubjects = AssignSubject::where('teacher_id', $request->teacherId)
                    ->with('school_subject:id,name')
                    ->with('subject_teacher:id,name')
                    ->with('student_class:id,name')
                    ->get();
 
     // $attendanceData = EmployeeAttendance::find($id);
 
     return response([
         'Teacher\'s Subjects' => $allSubjects
     ], 200);
}

 // Get the attendace report of teachers marked by admin
 public function studentsByClass(Request $request){

    $request->validate([
         'classId' => 'required|int'
     ]);
 
     $allStudents = students::select('id', 'name', 'fname', 'rollNumber')
     ->where('class_id', $request->classId)->get();
 
     // $attendanceData = EmployeeAttendance::find($id);
 
     return response([
         'All Students' => $allStudents
     ], 200);
}

public function getexamType(Request $request){

     $examTypes = ExamType::select('id', 'name')->get();
     return response([
         'ExamTypes' => $examTypes
     ], 200);
}

public function StudentsExamMarking(Request $request)
{
    Log::info('Received StudentsMarks data: '.json_encode($request->all()));

    $data = $request->json()->all();

    $validator = Validator::make($data, [
        '*.classId' => 'required|int',
        '*.subjectId' => 'required|int',
        '*.teacherId' => 'required|int',
        '*.studentId' => 'required|int',
        '*.exam_type' => 'required|string',
        '*.obtained_marks' => 'required|numeric',
        '*.total_marks' => 'required|numeric',
        '*.percentage' => 'required|numeric',
        '*.grade' => 'required|string',
        '*.year' => 'required|integer|between:1901,3055',

    ]);

    if ($validator->fails()) {
        Log::error('Validation error: '.$validator->errors()->first());
        return response([
            'message' => 'Validation error: '.$validator->errors()->first(),
        ], 400);
    }

    $createdIds = [];

    foreach ($data as $marks) {
        try {
            $exam = SchoolExam::create([
                'class_id' => $marks['classId'],
                'subject_id' => $marks['subjectId'],
                'student_id' => $marks['studentId'],
                'teacher_id' => $marks['teacherId'],
                'exam_type' => $marks['exam_type'],
                'obtained_marks' => $marks['obtained_marks'],
                'total_marks' => $marks['total_marks'],
                'percentage' => $marks['percentage'],
                'grade' => $marks['grade'],
                'year' => $marks['year']
            ]);

            $createdIds[] = $exam->id;

            Log::info('Exam marks added successfully for student '.$exam->student_id);
        } catch (\Exception $e) {
            Log::error('Database error: '.$e->getMessage());
            return response([
                'message' => 'Database error: '.$e->getMessage(),
            ], 500);
        }
    }

    return response([
        'message' => 'Exam marks added successfully for all students',
        'createdIds' => $createdIds,
    ], 200);
}

public function getClassMarksByYearAndType(Request $request)
{

    $validator = Validator::make($request->all(), [
        'classId' => 'required|integer',
        'exam_type' => 'required|string',
        'year' => 'required|integer|between:1901,3055'
    ]);

    if ($validator->fails()) {
        Log::error('Validation error: '.$validator->errors()->first());
        return response([
            'message' => 'Validation error: '.$validator->errors()->first(),
        ], 400);
    }

        try {
            $examDetails = SchoolExam::where('class_id', $validator->validated()['classId'])
            ->where('exam_type', $validator->validated()['exam_type'])
            ->whereYear('year', $validator->validated()['year'])
            ->get();

            Log::info('Exam marks fetched successfully for class '.$validator->validated()['classId'].' and year '.$validator->validated()['year']);

        } catch (\Exception $e) {
            Log::error('Database error: '.$e->getMessage());
            return response([
                'message' => 'Database error: '.$e->getMessage(),
            ], 500);
        }
    

        return response([
            'message' => 'Class Exam marks fetched successfully',
            'data' => $examDetails
        ], 200);
}

public function getStudentMarksByYearAndType(Request $request)
{

    $validator = Validator::make($request->all(), [
        'studentId' => 'required|integer',
        'classId' => 'required|integer',
        'exam_type' => 'required|string',
        'year' => 'required|integer|between:1901,3055'
    ]);

    if ($validator->fails()) {
        Log::error('Validation error: '.$validator->errors()->first());
        return response([
            'message' => 'Validation error: '.$validator->errors()->first(),
        ], 400);
    }

        try {
            $examDetails = SchoolExam::where('class_id', $validator->validated()['classId'])
            ->where('student_id', $validator->validated()['studentId'])
            ->where('exam_type', $validator->validated()['exam_type'])
            ->whereYear('year', $validator->validated()['year'])
            ->get();

            Log::info('Exam marks fetched successfully for class '.$validator->validated()['classId'].' and year '.$validator->validated()['year']);

        } catch (\Exception $e) {
            Log::error('Database error: '.$e->getMessage());
            return response([
                'message' => 'Database error: '.$e->getMessage(),
            ], 500);
        }
    

        return response([
            'message' => 'Student Exam marks fetched successfully',
            'data' => $examDetails
        ], 200);
}

// public function StudentsExamMarking(Request $request){

//     Log::info('Received StudentsMarks data: '.json_encode($request->all()));

//     $data = $request->json()->all();

//     if (count($data) == 0) {
//         return response([
//             'message' => 'No Marks data provided',
//         ], 400);
//     }

//     foreach ($data as $marks) {
//         $validator = Validator::make($marks, [
//             'classId' => 'required|int',
//             'subjectId' => 'required|int',
//             'teacherId' => 'required|int',
//             'studentId' => 'required|int',
//             'exam_type' => 'required|string',
//             'obtained_marks' => 'required|double',
//             'total_marks' => 'required|double'
//         ]);

//         if ($validator->fails()) {
//             Log::error('Validation error: '.$validator->errors()->first());
//             return response([
//                 'message' => 'Validation error: '.$validator->errors()->first(),
//             ], 400);
//         }

//         try {
//             $attendance = SchoolExam::create([
//                 'class_id' => $marks['classId'],
//                 'subject_id' => $marks['subjectId'],
//                 'student_id' => $marks['studentId'],
//                 'teacher_id' => $marks['teacherId'],
//                 'exam_type' => $marks['exam_type'],
//                 'obtained_marks' => $marks['obtained_marks'],
//                 'total_marks' => $marks['total_marks'],

//             ]);

//             Log::info('Attendance marked successfully for student '.$attendance['student_id']);

//         } catch (\Exception $e) {
//             Log::error('Database error: '.$e->getMessage());
//             return response([
//                 'message' => 'Database error: '.$e->getMessage(),
//             ], 500);
//         }
//     }

//     return response([
//         'message' => 'Exam Marks added successfully for all students',
//     ], 200);
// }

//     public function examMarking(Request $request){
//         $attrs = $request->validate([
//             'classId' => 'required|int',
//             'subjectId' => 'required|int',
//             'teacherId' => 'required|int',
//             'exam_type' => 'required|string',
//             'obtained_marks' => 'required|double',
//             'total_marks' => 'required|double'
//         ]);

//         $homeWork = HomeWork::create([
//             'class_id' => $attrs['classId'],
//             'subject_id' => $attrs['subjectId'],
//             'teacher_id' => $attrs['teacherId'],
//             'exam_type' => $attrs['exam_type'],
//             'obtained_marks' => $attrs['obtained_marks'],
//             'total_marks' => $attrs['total_marks'],

//            //todo: implement current user id as teacher id // 'user_id' => auth()->user()->id, 
//             // 'image' => $image
//         ]);

//         // response
//         return response([
//             'message' => 'Marking done for ' + $attrs['classId'] + '',
//             'homeWork' => $homeWork
//         ], 200);
// }
}
