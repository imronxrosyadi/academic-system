<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_grades', function (Blueprint $table) {
            $table->id();
            $table->integer('grade');
            $table->foreignId('student_id')->references('id')->on('students');
            $table->foreignId('subject_id')->references('id')->on('subjects');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_grades');
    }
}
