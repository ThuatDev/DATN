<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCapacityToProductDetailsTable extends Migration
{
    public function up()
    {
        Schema::table('product_details', function (Blueprint $table) {
            $table->string('capacity')->nullable(); // Thêm trường capacity
        });
    }

    public function down()
    {
        Schema::table('product_details', function (Blueprint $table) {
            $table->dropColumn('capacity'); // Xóa trường capacity khi rollback
        });
    }
}
