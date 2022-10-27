<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectGrade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades_subjects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subjects_id');
            $table->unsignedBigInteger('grades_id');
            $table->timestamps();

            $table->foreign('subjects_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('grades_id')->references('id')->on('grades')->onDelete('cascade');        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grades_subjects');
    }
}
