<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsStrand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('strands_subjects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subjects_id');
            $table->unsignedBigInteger('strands_id');
            $table->timestamps();

            $table->foreign('subjects_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('strands_id')->references('id')->on('strands')->onDelete('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('strands_subjects');
    }
}
