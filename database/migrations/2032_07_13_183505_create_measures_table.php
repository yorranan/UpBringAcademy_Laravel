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
        Schema::create('measures', function (Blueprint $table) {
            $table->id();
            $table->double('temperature');
            $table->double('umidity');
            $table->string('condition');
            $table->foreignId('place_id');
            $table->foreign('place_id')->references('id')->on('places');
            $table->foreignId('crop_id');
            $table->foreign('crop_id')->references('id')->on('crops');
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
        Schema::dropIfExists('measures');
    }
};
