<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filling_models', function (Blueprint $t) {
            $t->id();
            $t->string('name')->nullable();
            $t->string('background')->nullable();
            $t->string('thumb')->nullable();
            $t->boolean('is_img')->nullable();
            $t->boolean('is_mirror')->nullable();
            $t->string('available_for')->nullable();
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filling_models');
    }
}
