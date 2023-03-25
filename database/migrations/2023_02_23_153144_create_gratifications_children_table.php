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
        Schema::create('gratifications_children', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gratifications_id');
            $table->foreign('gratifications_id')->references('id')->on('gratifications');
            $table->foreignId('children_id');
            $table->foreign('children_id')->references('id')->on('users');
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
        Schema::dropIfExists('gratifications_children');
    }
};
