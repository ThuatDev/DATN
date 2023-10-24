<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('producer_id');
        $table->string('name');
        $table->string('image');
        $table->string('sku_code');
        $table->string('monitor');
        $table->string('front_camera');
        $table->string('rear_camera');
        $table->string('CPU');
        $table->string('GPU');
        $table->string('RAM');
        $table->string('ROM');
        $table->string('OS');
        $table->string('pin');
        $table->text('information_details');
        $table->text('product_introduction');
        $table->float('rate');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
