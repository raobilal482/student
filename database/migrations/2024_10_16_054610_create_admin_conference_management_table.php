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
        Schema::create('admin_conference_management', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Course name
            $table->text('description')->nullable(); // Course description
            $table->string('lecturers'); // Lecturers' names (you can use json for multiple lecturers)
            $table->date('date'); // Date of the course
            $table->time('time'); // Time of the course
            $table->string('address'); // Address for the course
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_conference_management');
    }
};
