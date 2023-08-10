<?php

namespace App\Http\Controllers\Backend\NoticeBoard;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use App\Models\students;
use App\Models\StudentYear;
use App\Models\student_notice_board;
use App\Models\teacher_notice_board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoticeBoardController extends Controller
{
public function NoticeView(){
//  dd("hellow world");
$data['years'] = StudentYear::all();
$data['classes'] = StudentClass::all();

$data['student_notice'] = student_notice_board::all();

$data['teacher_notice'] = teacher_notice_board::all(); 
// dd($data['teacher_notice']);

return view('backend.NoticeBoard.student_view',$data);
// return view('backend.NoticeBoard.student_view');

    }
    public function  NoticeAdd(){

return view('backend.NoticeBoard.noticeview');

    }
    public function NoticeStore(Request $request)
    {
        if ($request->has('teacher') && $request->has('student')) {
            // Both checkboxes are checked, save data to both tables
            $student_notice = new student_notice_board();
            $student_notice->title = $request->title;
            $student_notice->description = $request->description;
            $student_notice->notice_from = $request->noticefrom;
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                // $file->move(public_path('upload/student_attachments'), $filename);
               
                $student_notice->image = $filename;
            }
            $student_notice->save();
        
            $teacher_notice = new teacher_notice_board();
            $teacher_notice->title = $request->title;
            $teacher_notice->description = $request->description;
            $teacher_notice->notice_from = $request->noticefrom;
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/teacher_attachments'), $filename);
                $teacher_notice->image = $filename;
            }
            $teacher_notice->save();
        } elseif ($request->has('teacher')) {
            // Only teacher checkbox is checked, save data to teacher table
            $teacher_notice = new teacher_notice_board();
            $teacher_notice->title = $request->title;
            $teacher_notice->description = $request->description;
            $teacher_notice->notice_from = $request->noticefrom;
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/teacher_attachments'), $filename);
                $teacher_notice->image = $filename;
            }
            $teacher_notice->save();
        } elseif ($request->has('student')) {
            // Only student checkbox is checked, save data to student table
            $student_notice = new student_notice_board();
            $student_notice->title = $request->title;
            $student_notice->description = $request->description;
            $student_notice->notice_from = $request->noticefrom;
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/student_attachments'), $filename);
                $student_notice->image = $filename;
            }
            $student_notice->save();
        } else {
            // Neither checkbox was selected, handle this case as needed
        }
        $notification = array(
    		'message' => 'Notice Inserted Successfully',
    		'alert-type' => 'success'
    	);
        // Redirect to a success page
        return redirect()->route('notice.view')->with($notification);
    }
    public function search(Request $request)
    {
        $user_type = $request->input('user_type');
        
        if ($user_type === 'student') {
            $notices = DB::table('student_notice_boards')->get();
        } else if ($user_type === 'teacher') {
            $notices = DB::table('teacher_notice_boards')->get();
        } else {
            // handle invalid user type
        }
        
        // pass the notices data to the view
        return view('Backend.NoticeBoard.search_results', ['notices' => $notices],compact('user_type'));
    }
    

}
