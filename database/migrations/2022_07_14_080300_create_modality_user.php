
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModalityUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modality_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('modality_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('modality_id')->references('id')->on('modalities')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modality_user');
    }
}
