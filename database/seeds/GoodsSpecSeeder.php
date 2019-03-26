<?php

use Illuminate\Database\Seeder;

class GoodsSpecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => '颜色','goods_id'=>1, 'merchant_id' => 1],
            ['name' => '版本', 'goods_id'=>1,'merchant_id' => 1],
        ];
        DB::table('goods_specs')->insert($data);
    }
}
