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
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->integer('points');
            $table->foreignId('user_children_id');
            $table->foreign('user_children_id')->references('id')->on('users');
            $table->foreignId('parent_id');
            $table->foreign('parent_id')->references('id')->on('users');
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
        Schema::dropIfExists('children');
    }
};
