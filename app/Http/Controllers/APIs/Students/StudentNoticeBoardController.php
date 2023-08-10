<?php

namespace App\Http\Controllers\APIs\Students;

use App\Http\Controllers\Controller;
use App\Models\StudentNoticeBoard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StudentNoticeBoardController extends Controller
{
    public function getNotice()
    {

        try {
            $notifications = StudentNoticeBoard::with('teacher_name:id,name')
                ->orderBy('created_at', 'DESC')
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

    // get single notice
    public function getSingleNotice()
    {

        try {
            $notification = StudentNoticeBoard::with('teacher_name:id,name')
                ->get()->last();
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
            $notificationDetail = StudentNoticeBoard::where('id', $request->noticeId)
                ->with('teacher_name:id,name')
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
