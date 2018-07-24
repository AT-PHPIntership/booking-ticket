<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('film_id');
            $table->unsignedInteger('room_id');
            $table->datetime('datetime');
            $table->foreign('film_id')
                    ->reference('id')
                    ->on('films');
            $table->foreign('room_id')
                    ->reference('id')
                    ->on('rooms');
            $table->timestamps();
            $table->softDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
