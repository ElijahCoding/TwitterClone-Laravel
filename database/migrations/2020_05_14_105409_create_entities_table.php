<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entities', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('tweet_id')->index();
            $table->text('body');
            $table->text('body_plain');
            $table->string('type');
            $table->unsignedInteger('start');
            $table->unsignedInteger('end');
            $table->timestamps();

            $table->foreign('tweet_id')->references('id')->on('tweets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entities');
    }
}
