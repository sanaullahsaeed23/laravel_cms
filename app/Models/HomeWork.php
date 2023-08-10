<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeWork extends Model
{
    use HasFactory;

    protected $fillable =  [
      'class_id', 'subject_id', 'teacher_id', 'topic_name', 'task_title',  'task_description',  'submission_date'
    ];

    public function student_class(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }
 
  public function subject_name(){
        return $this->belongsTo(SchoolSubject::class,'subject_id','id');
    }
 
    public function subject_teacher(){
     return $this->belongsTo(teacher::class,'teacher_id','id');
   }
}
