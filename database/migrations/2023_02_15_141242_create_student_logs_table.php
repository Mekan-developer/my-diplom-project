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
        Schema::create('student_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('staff_id');
            // $table->foreignId('staff_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('student_id');
            // $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('computer_id');
            // $table->foreignId('computer_id')->constrained()->onDelete('cascade');
            $table->string('start');
            $table->string('end');
            $table->string('status');
            $table->timestamps();

            // $table->foreignId('student_id')->constrained()->onDelete('cascade');

            // $table->foreign('staff_id')->references('id')->on('users');
            // $table->foreign('student_id')->references('id')->on('students');
            // $table->foreign('computer_id')->references('id')->on('computers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_logs');
    }
};
