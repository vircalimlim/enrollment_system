<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTeachersSchedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects_teachers_schedule', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subjects_teachers_id');
            $table->unsignedBigInteger('section_id');
            $table->string('start')->nullable(); 
            $table->string('end')->nullable();
            $table->string('day')->nullable(); 
            $table->timestamps();

    
            $table->foreign('subjects_teachers_id')->references('id')->on('subjects_teachers')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');    
      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects_teachers_schedule');
    }
}
