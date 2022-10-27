<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSchoolyear extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_schoolyear', function (Blueprint $table) {
            $table->id();
            $table->string('lrnnumber');
            $table->string('schoolyear_start');
            $table->string('schoolyear_end');
            $table->string('grade');
            $table->string('strand');
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
        Schema::dropIfExists('user_schoolyear');
    }
}
