<?php

namespace App\Http\Controllers\APIs\Students;

use App\Http\Controllers\Controller;
use App\Models\StudentAttendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentAttendanceApiController extends Controller
{
    public function index(Request $request){

        $attrs = $request->validate([
            'student_id' => 'required|int',
            'startDate' => 'required|date',
            'endDate' => 'required|date'
        ]);
    
        $attendanceData = StudentAttendance::where('student_id', $request->student_id)
        ->whereBetween('attendanceDate', [$request->startDate, $request->endDate])
        ->get();
    
        // $attendanceData = EmployeeAttendance::find($id);
    
        return response([
            'Attendance' => $attendanceData
        ], 200);
    }

    public function getMonthlyAttendance(Request $request)
{
    $request->validate([
        'student_id' => 'required|int',
        'year' => 'required|numeric|min:1900|max:2100',
    ]);

    $monthlyAttendance = DB::table('student_attendances')
        ->select(
            DB::raw('MONTH(attendanceDate) AS month'),
            DB::raw('SUM(CASE WHEN attendance_status = "Absent" THEN 1 ELSE 0 END) AS absents'),
            DB::raw('SUM(CASE WHEN attendance_status = "Present" THEN 1 ELSE 0 END) AS presents'),
            DB::raw('SUM(CASE WHEN attendance_status = "Leave" THEN 1 ELSE 0 END) AS leaves')
        )
        ->where('student_id', $request->student_id)
        ->whereYear('attendanceDate', $request->year)
        ->groupBy(DB::raw('MONTH(attendanceDate)'))
        ->orderBy(DB::raw('MONTH(attendanceDate)'))
        ->get();

        return response([
            'Monthly Attendance' => $monthlyAttendance
        ], 200);
}


    //    public function getMonthlyAttendance(Request $request)
    //    {
    //     //    $month = $request->input('month'); // Assuming you pass the month value as a query parameter
        
    //     $request->validate([
    //         'student_id' => 'required|int',
    //         'month' => 'required|numeric|min:1|max:12',
    //         'year' => 'required|numeric|min:1900|max:2100',
    //     ]);

    //     $attendance = DB::table('student_attendances')
    //     ->select(DB::raw('SUM(CASE WHEN attendance_status = "Absent" THEN 1 ELSE 0 END) AS absents'))
    //     ->addSelect(DB::raw('SUM(CASE WHEN attendance_status = "Present" THEN 1 ELSE 0 END) AS presents'))
    //     ->addSelect(DB::raw('SUM(CASE WHEN attendance_status = "Leave" THEN 1 ELSE 0 END) AS leaves'))
    //     ->whereRaw('student_id = ?', [$request->student_id])
    //     ->whereRaw('YEAR(attendanceDate) = ?', [$request->year])
    //     ->whereRaw('MONTH(attendanceDate) = ?', [$request->month])
    //     ->groupBy(DB::raw('student_id, YEAR(attendanceDate), MONTH(attendanceDate) '))
    //     ->get();
   
    //        return response()->json($attendance);
    //    }

}
