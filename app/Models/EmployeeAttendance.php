<?php

namespace App\Models; 

use App\Models\teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAttendance extends Model
{
     public function user(){
     	return $this->belongsTo(teacher::class,'employee_id','id');
     }
}
