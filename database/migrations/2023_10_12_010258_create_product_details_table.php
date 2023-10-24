<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
{
    Schema::create('product_details', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('product_id');
        $table->string('color');
        $table->integer('import_quantity');
        $table->integer('quantity');
        $table->decimal('import_price', 10, 2);
        $table->decimal('sale_price', 10, 2);
        $table->decimal('promotion_price', 10, 2)->nullable();
        $table->date('promotion_start_date')->nullable();
        $table->date('promotion_end_date')->nullable();
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
        Schema::dropIfExists('product_details');
    }
}
