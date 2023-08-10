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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('rollNumber')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('code');
            $table->string('mobile')->nullable();
            $table->string('address');
            $table->string('gender');
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('religion');
            $table->date('dob');
            $table->integer('year_id');
            $table->integer('class_id');
            $table->integer('group_id');
            $table->integer('shift_id');
            $table->text('profile')->nullable();    
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('otp_code')->nullable();
            $table->timestamp('otp_created_at')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->rememberToken();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
