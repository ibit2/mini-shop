<?php

use Illuminate\Database\Seeder;

class MemberCartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['member_id' => 1, 'goods_id' => 1,'goods_sku_id'=>0,'goods_name'=>'商品名称','purchase_num'=>2,'goods_stock_num'=>1,'goods_sale_price'=>20,'goods_total_price'=>40,'goods_spec_value_path'=>'1_3','goods_spec_value_path_show'=>'属性1_属性2'],
            ['member_id' => 1, 'goods_id' => 2,'goods_sku_id'=>0,'goods_name'=>'商品名称','purchase_num'=>2,'goods_stock_num'=>1,'goods_sale_price'=>20,'goods_total_price'=>40,'goods_spec_value_path'=>'1_3','goods_spec_value_path_show'=>'属性1_属性2'],
            ['member_id' => 1, 'goods_id' => 3,'goods_sku_id'=>0,'goods_name'=>'商品名称','purchase_num'=>2,'goods_stock_num'=>1,'goods_sale_price'=>20,'goods_total_price'=>40,'goods_spec_value_path'=>'1_3','goods_spec_value_path_show'=>'属性1_属性2'],
            ['member_id' => 1, 'goods_id' => 4,'goods_sku_id'=>0,'goods_name'=>'商品名称','purchase_num'=>2,'goods_stock_num'=>1,'goods_sale_price'=>20,'goods_total_price'=>40,'goods_spec_value_path'=>'1_3','goods_spec_value_path_show'=>'属性1_属性2'],
            ['member_id' => 1, 'goods_id' => 5,'goods_sku_id'=>0,'goods_name'=>'商品名称','purchase_num'=>2,'goods_stock_num'=>1,'goods_sale_price'=>20,'goods_total_price'=>40,'goods_spec_value_path'=>'1_3','goods_spec_value_path_show'=>'属性1_属性2'],
        ];
        DB::table('member_carts')->insert($data);
    }
}
