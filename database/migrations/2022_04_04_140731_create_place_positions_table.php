<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_position_models', function (Blueprint $t) {
            $t->id();
            $t->string('name')->nullable();
            $t->string('image')->nullable();
            $t->boolean('has_gable')->nullable();
            $t->boolean('has_impact')->nullable();
            $t->enum('gable_position', ['right', 'left', 'left-right'])->nullable();
            $t->enum('impact_position', ['right', 'left', 'left-right'])->nullable();
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
        Schema::dropIfExists('place_position_models');
    }
}
