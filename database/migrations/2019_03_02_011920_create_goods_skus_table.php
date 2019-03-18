<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsSkusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_skus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('goods_spec_value_path')->comment('规格值组成的路径');
            $table->decimal('sale_price')->comment('销售价');
            $table->decimal('line_price')->comment('划线价');
            $table->unsignedInteger('stock_num')->comment('库存');
            $table->integer('goods_id')->comment('所属商品');
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
        Schema::dropIfExists('goods_skus');
    }
}
