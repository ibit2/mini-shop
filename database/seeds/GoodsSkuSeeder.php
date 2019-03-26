<?php

use Illuminate\Database\Seeder;

class GoodsSkuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['goods_spec_value_path' => '1_3','sale_price'=>100, 'line_price' => 0.00,'stock_num'=>100,'goods_id'=>1,'is_default'=>0],
            ['goods_spec_value_path' => '1_4','sale_price'=>200, 'line_price' => 0.00,'stock_num'=>200,'goods_id'=>1,'is_default'=>1],
            ['goods_spec_value_path' => '1_5','sale_price'=>300, 'line_price' => 0.00,'stock_num'=>300,'goods_id'=>1,'is_default'=>0],
            ['goods_spec_value_path' => '2_3','sale_price'=>400, 'line_price' => 0.00,'stock_num'=>400,'goods_id'=>1,'is_default'=>0],
            ['goods_spec_value_path' => '2_4','sale_price'=>500, 'line_price' => 0.00,'stock_num'=>500,'goods_id'=>1,'is_default'=>0],
            ['goods_spec_value_path' => '2_5','sale_price'=>600, 'line_price' => 0.00,'stock_num'=>600,'goods_id'=>1,'is_default'=>0],

        ];
        DB::table('goods_skus')->insert($data);
    }
}
