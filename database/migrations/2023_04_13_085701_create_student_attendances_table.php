<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_attendances', function (Blueprint $table) {
            $table->id();
            $table->integer('class_id')->comment('class_id=classTable id');
            $table->integer('student_id')->comment('student_id=std_rollNo');
            $table->integer('subject_id')->comment('subject_id=Subject_tbl_id');
            $table->date('attendanceDate');
            $table->string('attendance_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_attendances');
    }
};
