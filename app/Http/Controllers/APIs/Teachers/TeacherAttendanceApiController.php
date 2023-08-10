<?php

namespace App\Http\Controllers\APIs\Teachers;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use App\Models\StudentAttendance;
use App\Models\students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class TeacherAttendanceApiController extends Controller
{

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


   // Get all the students registered in any class...
   public function index(Request $request){

    $request->validate([
         'id' => 'required|int',
         'startDate' => 'required|date',
         'endDate' => 'required|date'
     ]);
 
     $attendanceData = EmployeeAttendance::where('employee_id', $request->id)
     ->whereBetween('date', [$request->startDate, $request->endDate])
     ->get();
 
     // $attendanceData = EmployeeAttendance::find($id);
 
     return response([
         'Attendance' => $attendanceData
     ], 200);
    }


    ///// **** Mark attendance of All Students ************///////
    public function markStudentAttendance(Request $request){

        Log::info('Received attendance data: '.json_encode($request->all()));
    
        $data = $request->json()->all();
    
        if (count($data) == 0) {
            return response([
                'message' => 'No attendance data provided',
            ], 400);
        }

        foreach ($data as $attendance) {
            $validator = Validator::make($attendance, [
                'class_id' => 'required|int',
                'student_id' => 'required|int',
                'subject_id' => 'required|int',
                'attendanceDate' => 'required|date',
                'attendance_status' => 'required|string'
            ]);
    
            if ($validator->fails()) {
                Log::error('Validation error: '.$validator->errors()->first());
                return response([
                    'message' => 'Validation error: '.$validator->errors()->first(),
                ], 400);
            }
    
            try {
                $attendance = StudentAttendance::create([
                    'class_id' => $attendance['class_id'],
                    'student_id' => $attendance['student_id'],
                    'subject_id' => $attendance['subject_id'],
                    'attendanceDate' => $attendance['attendanceDate'],
                    'attendance_status' => $attendance['attendance_status']
                ]);
    
                Log::info('Attendance marked successfully for student '.$attendance['student_id']);
    
            } catch (\Exception $e) {
                Log::error('Database error: '.$e->getMessage());
                return response([
                    'message' => 'Database error: '.$e->getMessage(),
                ], 500);
            }
        }
    
        return response([
            'message' => 'Attendance marked successfully for all students '. $attendance ,
        ], 200);
    }
    
    public function getMonthlyAttendance(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|int',
            'year' => 'required|numeric|min:1900|max:2100',
        ]);
    
        $monthlyAttendance = DB::table('employee_attendances')
            ->select(
                DB::raw('MONTH(date) AS month'),
                DB::raw('SUM(CASE WHEN attend_status = "Absent" THEN 1 ELSE 0 END) AS absents'),
                DB::raw('SUM(CASE WHEN attend_status = "Present" THEN 1 ELSE 0 END) AS presents'),
                DB::raw('SUM(CASE WHEN attend_status = "Leave" THEN 1 ELSE 0 END) AS leaves')
            )
            ->where('employee_id', $request->teacher_id)
            ->whereYear('date', $request->year)
            ->groupBy(DB::raw('MONTH(date)'))
            ->orderBy(DB::raw('MONTH(date)'))
            ->get();
    
            return response([
                'Monthly Attendance' => $monthlyAttendance
            ], 200);
    }

    /////// ******** My old funciton api **************/////
//    public function markStudentAttendance(Request $request){

//     $attrs = $request->validate([
//         'class_id' => 'required|int',
//         'student_id' => 'required|int',
//         'attendanceDate' => 'required|date',
//         'attendance_status' => 'required|string'
//     ]);


//     //create
//     $attendace = StudentAttendance::create([
//         'class_id' => $attrs['class_id'],
//         'student_id' => $attrs['student_id'],
//         'attendanceDate' => $attrs['attendanceDate'],
//         'attendance_status' => $attrs['attendance_status']
//     ]);


//     return response([
//         'message' => 'Attendance Marked Successully',
//         'studentID' => $attendace,

//     ], 200);
//    }
}
