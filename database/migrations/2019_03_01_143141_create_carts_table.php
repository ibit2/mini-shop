<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
/*
 * 购物车
 */
class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('所属用户');
            $table->integer('goods_id');
            $table->integer('goods_name')->comment('商品名称');
            $table->integer('goods_num')->comment('购买数量');
            $table->decimal('goods_price')->comment('单价');
            $table->decimal('goods_total_price')->comment('总价');

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
        Schema::dropIfExists('carts');
    }
}
