<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStartDateAndEndDateToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->timestamp('start_date')->nullable(); // Ngày giờ bắt đầu Flash Sale
            $table->timestamp('end_date')->nullable();   // Ngày giờ kết thúc Flash Sale
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
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
        });
    }
}
