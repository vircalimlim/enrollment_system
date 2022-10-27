<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCondionallyPromotedSubjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conditionally_promoted_subjects', function (Blueprint $table) {

            $table->id();
       
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('subjects_teachers_schedule_id');
        
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
        Schema::dropIfExists('conditionally_promoted_subjects');
    }
}
