<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
/*
 * 商品
 */
class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('商品名称');
            $table->integer('price')->comment('默认价格');
            $table->unsignedInteger('sales_initial')->comment('初始销量')->default(0);
            $table->unsignedInteger('sales_actual')->comment('实际销量')->default(0);
            $table->text('imgs')->comment('图片数组');
            $table->text('detail')->comment('详情');
            $table->tinyInteger('stock_calcu_type')->comment('库存计算方式：1-付款减库存，2-下单减库存');
            $table->tinyInteger('status')->comment('状态：1-上架，0-下架');
            $table->integer('goods_category_id')->comment('分类id');
            $table->integer('merchant_id')->comment('商户id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
    }
}
