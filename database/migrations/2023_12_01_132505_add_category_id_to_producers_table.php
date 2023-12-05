<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToProducersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('producers', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->after('name')->nullable();

            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('SET NULL'); // hoặc 'CASCADE' nếu bạn muốn xóa toàn bộ hàng liên quan khi xóa danh mục
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('producers', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
}
