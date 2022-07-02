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
        Schema::create('reviews_shares', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('review_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('review_id')->references('id')->on('reviews');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews_shares');
    }
};
