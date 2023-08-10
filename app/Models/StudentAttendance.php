<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'student_id',
        'subject_id',
        'attendanceDate',
        'attendance_status',
    ];

    public function student(){
        return $this->belongsTo(students::class,'student_id','id');
    }

    public function classes(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }
}
