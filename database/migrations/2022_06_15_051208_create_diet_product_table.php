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
        Schema::create('diet_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('diet_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->integer('grams');
            $table->string('when');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diet_product');
    }
};
