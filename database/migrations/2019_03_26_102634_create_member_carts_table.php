<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_carts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('goods_name')->comment('商品名称');
            $table->decimal('goods_sale_price')->comment('单价');
            $table->integer('goods_stock_num')->comment('库存');
            $table->integer('purchase_num')->comment('购买数量');
            $table->decimal('goods_total_price')->comment('总价');
            $table->integer('goods_sku_id')->comment('商品的sku的id');
            $table->string('goods_spec_value_path')->comment('规格值组成的路径');
            $table->string('goods_spec_value_path_show')->comment('规格值组成的路径的展示值');
            $table->integer('member_id')->comment('用户id');
            $table->integer('goods_id')->comment('商品id');
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
        Schema::dropIfExists('member_carts');
    }
}
