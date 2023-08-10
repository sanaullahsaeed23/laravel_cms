<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeave extends Model
{
    public function teacher(){
    	return $this->belongsTo(teacher::class,'employee_id','id');
    }

     public function purpose(){
    	return $this->belongsTo(LeavePurpose::class,'leave_purpose_id','id');
    }

    
}
