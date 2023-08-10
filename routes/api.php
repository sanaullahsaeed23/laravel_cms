<?php

use App\Http\Controllers\APIs\Students\StudentAttendanceApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIs\Teachers\TeacherAuthApiController;
use App\Http\Controllers\APIs\Students\StudentAuthApiController;
use App\Http\Controllers\APIs\Students\StudentHomeWorkController;
use App\Http\Controllers\APIs\Students\StudentSallybusController;
use App\Http\Controllers\APIs\Students\StudentTimeTableController;
use App\Http\Controllers\APIs\Students\StudentExamResultController;
use App\Http\Controllers\APIs\Students\StudentNoticeBoardController;
use App\Http\Controllers\APIs\Teachers\AssignHomeWork;
use App\Http\Controllers\APIs\Teachers\TeacherAttendanceApiController;
use App\Http\Controllers\APIs\Teachers\TeacherSallybusControllertroller;
use App\Http\Controllers\APIs\Teachers\TeacherTimeTableController;
use App\Http\Controllers\APIs\Teachers\ExamMarking;
use App\Http\Controllers\APIs\Teachers\TeacherNoticeBoardController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('teacher/send_otp', [TeacherAuthApiController::class, 'send_reset_password_otp']);
Route::post('teacher/reset_password', [TeacherAuthApiController::class, 'reset_password_with_otp_verification']);

Route::post('student/send_otp', [StudentAuthApiController::class, 'send_reset_password_otp']);
Route::post('student/reset_password', [StudentAuthApiController::class, 'reset_password_with_otp_verification']);



Route::post('teacher/login', [TeacherAuthApiController::class, 'login']);
Route::get('teacher/detials', [TeacherAuthApiController::class, 'teacherDetails'])
        ->middleware(['auth:sanctum', 'abilities:teacher']);
Route::post('teacher/logout', [TeacherAuthApiController::class, 'logout'])
        ->middleware(['auth:sanctum', 'abilities:teacher']);

Route::post('student/login', [StudentAuthApiController::class, 'login']);
Route::get('student/detials', [StudentAuthApiController::class, 'studentDetails'])
        ->middleware(['auth:sanctum', 'abilities:student']);
Route::post('student/logout', [StudentAuthApiController::class, 'logout'])
        ->middleware(['auth:sanctum', 'abilities:student']);


        // Attendance Teacher
Route::post('teacher/attendance/report', [TeacherAttendanceApiController::class, 'index'])
        ->middleware(['auth:sanctum', 'abilities:teacher']);
Route::post('student/attendance/mark', [TeacherAttendanceApiController::class, 'markStudentAttendance'])
        ->middleware(['auth:sanctum', 'abilities:teacher']);
Route::post('teacher/view/allStudents', [TeacherAttendanceApiController::class, 'studentsByClass'])
        ->middleware(['auth:sanctum', 'abilities:teacher']);
        //// Monthly attendance
Route::post('teacher/monthly/attendance', [TeacherAttendanceApiController::class, 'getMonthlyAttendance'])
        ->middleware(['auth:sanctum', 'abilities:teacher']);         

Route::post('student/attendance/report', [StudentAttendanceApiController::class, 'index'])
        ->middleware(['auth:sanctum', 'abilities:student']); 
        //// Monthly attendance
Route::post('student/monthly/attendance', [StudentAttendanceApiController::class, 'getMonthlyAttendance'])
        ->middleware(['auth:sanctum', 'abilities:student']); 

     // Sallybus
Route::post('student/sallybus', [StudentSallybusController::class, 'index'])
     ->middleware(['auth:sanctum', 'abilities:student']); 
Route::post('teacher/sallybus', [TeacherSallybusControllertroller::class, 'index'])
     ->middleware(['auth:sanctum', 'abilities:teacher']); 

      // HomeWork
Route::post('student/homework/view', [StudentHomeWorkController::class, 'index'])
        ->middleware(['auth:sanctum', 'abilities:student']); 
Route::post('student/homework/getsubjectId', [StudentHomeWorkController::class, 'getSubjectId'])
        ->middleware(['auth:sanctum', 'abilities:student']); 
Route::post('student/view/class/subjects', [StudentHomeWorkController::class, 'getSubjects'])
      ->middleware(['auth:sanctum', 'abilities:student']);
Route::post('student/view/homework/details', [StudentHomeWorkController::class, 'homeworkAssignedDetails'])
      ->middleware(['auth:sanctum', 'abilities:student']);


Route::post('teacher/homework/assign', [AssignHomeWork::class, 'assignTask'])
        ->middleware(['auth:sanctum', 'abilities:teacher']); 
Route::post('teacher/view/homework', [AssignHomeWork::class, 'getHomeWorks'])
      ->middleware(['auth:sanctum', 'abilities:teacher']); 
Route::post('teacher/view/homework/details', [AssignHomeWork::class, 'homeworkAssignedDetails'])
      ->middleware(['auth:sanctum', 'abilities:teacher']); 
Route::post('teacher/view/class/subjects', [AssignHomeWork::class, 'getSubjects'])
      ->middleware(['auth:sanctum', 'abilities:teacher']); 



      // TimeTable
Route::post('student/timetable/view', [StudentTimeTableController::class, 'index'])
      ->middleware(['auth:sanctum', 'abilities:student']); 
Route::post('teacher/timetable/view', [TeacherTimeTableController::class, 'index'])
      ->middleware(['auth:sanctum', 'abilities:teacher']); 

//       Exam Section
Route::post('teacher/viewsubjects/byclassteacher', [ExamMarking::class, 'subjectsByClassAndTeacher'])
      ->middleware(['auth:sanctum', 'abilities:teacher']); 
Route::post('teacher/viewsubjects/byteacher', [ExamMarking::class, 'subjectsByTeacher'])
      ->middleware(['auth:sanctum', 'abilities:teacher']); 
Route::post('teacher/viewstudents/byclass', [ExamMarking::class, 'studentsByClass'])
      ->middleware(['auth:sanctum', 'abilities:teacher']);
Route::post('teacher/exam/types', [ExamMarking::class, 'getexamType'])
      ->middleware(['auth:sanctum', 'abilities:teacher']);
Route::post('teacher/exam/marking', [ExamMarking::class, 'StudentsExamMarking'])
      ->middleware(['auth:sanctum', 'abilities:teacher']);
Route::post('teacher/view/clsmarksby/year/type', [ExamMarking::class, 'getClassMarksByYearAndType'])
      ->middleware(['auth:sanctum', 'abilities:teacher']); 
Route::post('teacher/view/stdmarksby/year/type', [ExamMarking::class, 'getStudentMarksByYearAndType'])
      ->middleware(['auth:sanctum', 'abilities:teacher']); 


//       Student
Route::post('student/view/result', [StudentExamResultController::class, 'index'])
      ->middleware(['auth:sanctum', 'abilities:student']); 
Route::post('student/view/exam/overview', [StudentExamResultController::class, 'examOverview'])
      ->middleware(['auth:sanctum', 'abilities:student']); 



//    NoticeBoard
Route::get('student/view/noticeboard', [StudentNoticeBoardController::class, 'getNotice'])
      ->middleware(['auth:sanctum', 'abilities:student']);
Route::get('student/view/signle-notice', [StudentNoticeBoardController::class, 'getSingleNotice'])
      ->middleware(['auth:sanctum', 'abilities:student']); 
                              /// Read More 
Route::post('student/view/notice/details', [StudentNoticeBoardController::class, 'noticeDetails'])
      ->middleware(['auth:sanctum', 'abilities:student']);

Route::get('teacher/view/noticeboard', [TeacherNoticeBoardController::class, 'getNotice'])
      ->middleware(['auth:sanctum', 'abilities:teacher']);
Route::get('teacher/view/signle-notice', [TeacherNoticeBoardController::class, 'getSingleNotice'])
      ->middleware(['auth:sanctum', 'abilities:teacher']);  
                              //// Read more
Route::post('teacher/view/notice/details', [TeacherNoticeBoardController::class, 'noticeDetails'])
      ->middleware(['auth:sanctum', 'abilities:teacher']); 
Route::post('teacher/post/notice', [TeacherNoticeBoardController::class, 'postNotice'])
      ->middleware(['auth:sanctum', 'abilities:teacher']); 

      // Student Profile 
Route::post('student/change/password', [StudentAuthApiController::class, 'changePassoword'])
      ->middleware(['auth:sanctum', 'abilities:student']);
Route::post('student/view/teachers-list', [StudentAuthApiController::class, 'teachersList'])
      ->middleware(['auth:sanctum', 'abilities:student']);