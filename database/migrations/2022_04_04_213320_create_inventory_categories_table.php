<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_category_models', function (Blueprint $t) {
            $t->id();
            $t->string('name')->nullable();
            $t->enum('type', ['vertical', 'horizontal'])->nullable();
            $t->string('thumb')->nullable();
            $t->boolean('snap_floor')->nullable();
            $t->boolean('top_view')->nullable();
            $t->string('snap_to_category')->nullable();
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
        Schema::dropIfExists('inventory_category_models');
    }
}
