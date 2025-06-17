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
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->unique();
            $table->string('student_name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Prefer not to say', 'Other'])->default('Prefer not to say');
            $table->string('address')->nullable();
            $table->date('enrollment_date');
            $table->foreign('department_id')->references('department_id')->on('department')->onDelete('cascade');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->enum('current_semester', ['1st year 1st semester', '1st year 2nd semester', '2nd year 1st semester', '2nd year 2nd semester', '3rd year 1st semester', '3rd year 2nd semester', '4th year 1st semester', '4th year 2nd semester']);
            $table->enum('status', ['Active', 'On Leave', 'Suspended', 'Graduated', 'Withdrawn'])->default('Active');
            $table->string('photo_url')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
