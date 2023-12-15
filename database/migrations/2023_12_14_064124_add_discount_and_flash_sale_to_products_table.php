<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDiscountAndFlashSaleToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('discount', 10, 2)->default(0); // Trường khuyến mãi
            $table->boolean('flash_sale')->default(false); // Trường flash sale
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
      public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('discount');
            $table->dropColumn('flash_sale');
        });
    }
}
