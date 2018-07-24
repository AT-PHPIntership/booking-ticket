<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name')->charset('utf8')->collation('utf8_unicode_ci');
            $table->unsignedInteger('price');
            $table->string('actor')->charset('utf8')->collation('utf8_unicode_ci')->nullable();
            $table->string('producer')->charset('utf8')->collation('utf8_unicode_ci')->nullable();
            $table->unsignedInteger('duration');
            $table->string('describe')->charset('utf8')->collation('utf8_unicode_ci')->nullable();
            $table->string('country')->charset('utf8')->collation('utf8_unicode_ci')->nullable();
            $table->datetime('start_date')->nullable();
            $table->datetime('end_date')->nullable();
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
        Schema::dropIfExists('films');
    }
}
