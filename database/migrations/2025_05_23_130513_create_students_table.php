<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('place_of_birth')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->text('address')->nullable();
            $table->string('nik', 16)->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('parent_phone')->nullable();
            $table->text('parent_address')->nullable();
            $table->string('previous_school_name')->nullable();
            $table->year('graduation_year')->nullable();
            $table->string('student_phone')->nullable();
            $table->text('special_notes')->nullable();
            $table->integer('iq_score')->nullable();
            $table->integer('parent_income')->nullable();
            $table->enum('family_relation', ['yes', 'no'])->nullable();
            $table->enum('achievement_level', ['none', 'school', 'district', 'city', 'province', 'national'])->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
}