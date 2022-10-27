<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSchoolyear extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schoolyear', function (Blueprint $table) {
            $table->id();
          
            $table->string('year_start')->nullable();
            $table->string('year_end')->nullable();
            $table->string('enrolment_start')->nullable();
            $table->string('enrolment_end')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('schoolyear');
    }
}
