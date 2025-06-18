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
        Schema::create('gpa', function (Blueprint $table) {
            $table->id('gpa_id');
            $table->string('student_id');
            $table->foreign('student_id')->references('student_id')->on('student')->onDelete('cascade');
            $table->enum('semester', [
                '1st year 1st semester',
                '1st year 2nd semester',
                '2nd year 1st semester',
                '2nd year 2nd semester',
                '3rd year 1st semester',
                '3rd year 2nd semester',
                '4th year 1st semester',
                '4th year 2nd semester'
            ]);
            $table->decimal('gpa', 3, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gpa');
    }
};
