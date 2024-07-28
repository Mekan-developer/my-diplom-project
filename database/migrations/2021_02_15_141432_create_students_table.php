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
            $table->integer('student_id');
            $table->string('barcode');
            $table->string('lname');
            $table->string('fname');
            // $table->string('mname');
            $table->string('gender');
            $table->text('address');
            $table->string('email');
            $table->string('dob');
            $table->string('contact');
            $table->string('course');
            $table->string('profile_path');
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
