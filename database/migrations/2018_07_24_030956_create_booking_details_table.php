<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('booking_id');
            $table->unsignedInteger('ticket_id');
            $table->unsignedInteger('seat_id');
            $table->foreign('booking_id')
                    ->references('id')
                    ->on('bookings');
            $table->foreign('ticket_id')
                    ->references('id')
                    ->on('tickets');
            $table->foreign('seat_id')
                    ->references('id')
                    ->on('seats');        
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_details');
    }
}
