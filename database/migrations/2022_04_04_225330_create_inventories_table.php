<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_models', function (Blueprint $t) {
            $t->id();
            $t->string('name')->nullable();
            $t->decimal('price')->nullable();
            $t->integer('width')->nullable();
            $t->integer('height')->nullable();
            $t->integer('depth')->nullable();
            $t->string('thumb')->nullable();
            $t->string('front')->nullable();
            $t->string('top')->nullable();
            $t->string('product_code')->nullable();
            $t->integer('category_id')->nullable();
            $t->string('fits_in')->nullable();
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
        Schema::dropIfExists('inventory_models');
    }
}
