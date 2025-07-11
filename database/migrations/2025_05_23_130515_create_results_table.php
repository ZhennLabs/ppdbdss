<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->decimal('final_score', 5, 2);
            $table->integer('rank');
            $table->string('class', 1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('results');
    }
}