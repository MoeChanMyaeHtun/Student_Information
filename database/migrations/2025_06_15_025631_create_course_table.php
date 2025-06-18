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
        Schema::create('course', function (Blueprint $table) {
            $table->id();
            $table->string('course_id')->unique();
            $table->string('course_name');
            $table->foreign('teacher_id')->references('teacher_id')->on('teacher')->onDelete('cascade');
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->foreign('department_id')->references('id')->on('department')->onDelete('cascade');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->integer('credits');
            $table->enum('semester', ['1st year 1st semester', '1st year 2nd semester', '2nd year 1st semester', '2nd year 2nd semester', '3rd year 1st semester', '3rd year 2nd semester', '4th year 1st semester', '4th year 2nd semester']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course');
    }
};
