<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementsPermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements_grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('announcements_id');
            $table->unsignedBigInteger('grades_id');
            $table->timestamps();
         $table->foreign('announcements_id')->references('id')->on('announcements')->onDelete('cascade');
            $table->foreign('grades_id')->references('id')->on('grades')->onDelete('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcements_grades');
    }
}
