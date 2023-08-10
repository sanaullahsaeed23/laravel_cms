<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class students extends Authenticable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $guard = 'student';
    public function student()
    {
        return $this->belongsTo(AssignStudent::class,'student_id','rollNumber');
    }
    public function student_year()
    {
        return $this->belongsTo(StudentYear::class, 'year_id', 'id');  
        // 'year_id is the forign key for StudentYear tabel in students table
        // id is the primary key of studentsYear table
    }

    public function student_class()
    {
        return $this->belongsTo(StudentClass::class, 'class_id', 'id'); 
    }
    public function discount()
    {
     return $this->belongsTo(DiscountStudent::class,'id','assign_student_id');

    }
    public function student_group()
    {
        return $this->belongsTo(StudentGroup::class, 'group_id', 'id'); 
    }
    public function student_shift()
    {
        return $this->belongsTo(StudentShift::class, 'shift_id', 'id'); 
    }
}
