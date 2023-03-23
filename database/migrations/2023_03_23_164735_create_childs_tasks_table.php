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
        Schema::create('childs_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tasks_id');
            $table->foreign('tasks_id')->references('id')->on('tasks');
            $table->foreignId('childs_id');
            $table->foreign('childs_id')->references('id')->on('childs');
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
        Schema::dropIfExists('childs_tasks');
    }
};
