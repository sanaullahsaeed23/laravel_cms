<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolExam extends Model
{
    use HasFactory;

    protected $fillable =  [
        'class_id', 'subject_id', 'student_id', 'teacher_id', 'exam_type', 'obtained_marks',  'total_marks'
        , 'percentage', 'grade', 'year'
      ];

      public function student_class(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
      }
   
    public function school_subject(){
        return $this->belongsTo(SchoolSubject::class,'subject_id','id');
      }
   
      public function subject_teacher(){
       return $this->belongsTo(teacher::class,'teacher_id','id');
     }

}