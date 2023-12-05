<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductStorageOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('product_storage_options', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('product_id');
    $table->string('storage_capacity');
    $table->timestamps();

    $table->foreign('product_id')->references('id')->on('product_details')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_storage_options');
    }
}
