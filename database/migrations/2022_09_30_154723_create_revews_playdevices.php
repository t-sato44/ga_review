<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revews_playdevices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('playdevice_id');
            $table->unsignedBigInteger('review_id');
            $table->timestamps();
            $table->foreign('playdevice_id')->references('id')->on('play_devices');
            $table->foreign('review_id')->references('id')->on('reviews');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revews_playdevices');
    }
};
