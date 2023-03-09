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
        Schema::create('finished_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id');
            $table->foreign('id')->references('id')->on('users');
            $table->foreignId('id');
            $table->foreign('id')->references('id')->on('tasks');
            $table->string('feedback');
            $table->boolean('status');
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
        Schema::dropIfExists('finished_tasks');
    }
};
