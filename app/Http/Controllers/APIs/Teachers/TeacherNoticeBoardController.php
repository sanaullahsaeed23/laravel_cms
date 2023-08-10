<?php

namespace App\Http\Controllers\APIs\Teachers;

use App\Http\Controllers\Controller;
use App\Models\StudentNoticeBoard;
use App\Models\TeacherNoticeBoard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TeacherNoticeBoardController extends Controller
{
    public function getNotice()
    {

        try {
            $notifications = TeacherNoticeBoard::orderBy('created_at', 'DESC')
                ->get();
        } catch (\Exception $e) {
            Log::error('Database error: ' . $e->getMessage());
            return response([
                'message' => 'Database error: ' . $e->getMessage(),
            ], 500);
        }

        return response([
            'Notifications' => $notifications
        ], 200);
    }

    public function postNotice(Request $request)
    {
        $request->validate([
            'teacherId' => 'required|int',
            'title' => 'required|string',
            'description' => 'required|string',
            'notice_from' => 'required'
        ]);

        try {
            $postNotice = StudentNoticeBoard::create([
                'teacher_id' => $request['teacherId'],
                'title' => $request['title'],
                'description' => $request['description'],
                //todo:      // 'attachement' => $request['attachement'],
                'notice_from' => $request['notice_from']
            ]);

            Log::info('Notification Posted ' . $postNotice['title']);
        } catch (\Exception $e) {
            Log::error('Database error: ' . $e->getMessage());
            return response([
                'message' => 'Database error: ' . $e->getMessage(),
            ], 500);
        }

        return response([
            'Marked Notifications Detials' => $postNotice
        ], 200);
    }

    // get single notice
    public function getSingleNotice()
    {

        try {
            $notification = TeacherNoticeBoard::get()->last();
        } catch (\Exception $e) {
            Log::error('Database error: ' . $e->getMessage());
            return response([
                'message' => 'Database error: ' . $e->getMessage(),
            ], 500);
        }

        return response([
            'Latest Notification' => $notification
        ], 200);
    }

    public function noticeDetails(Request $request)
    {

        $request->validate([
            'noticeId' => 'required' /// 'id' column of the database table
        ]);
        try {
            $notificationDetail = TeacherNoticeBoard::where('id', $request->noticeId)
                ->get();
        } catch (\Exception $e) {
            Log::error('Database error: ' . $e->getMessage());
            return response([
                'message' => 'Database error: ' . $e->getMessage(),
            ], 500);
        }

        return response([
            'Notification Details' => $notificationDetail
        ], 200);
    }
}
