<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('arbiter_id');
            $table->unsignedInteger('first_criterion');
            $table->unsignedInteger('second_criterion');
            $table->unsignedInteger('third_criterion');
            $table->unsignedInteger('dancer_id');
            $table->boolean('invalid')->default($value = false);
            $table->timestamps();

            //Foreign Kay Constraints
            $table->foreign('arbiter_id')->references('id')->on('users');
            $table->foreign('dancer_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
