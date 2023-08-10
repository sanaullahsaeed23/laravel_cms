<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentNoticeBoard extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id', 'title', 'description', 'attachement', 'notice_from'
      ];

    public function teacher_name(){
    	return $this->belongsTo(teacher::class,'teacher_id','id');
    }
}
