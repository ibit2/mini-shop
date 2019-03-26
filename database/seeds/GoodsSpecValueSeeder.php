<?php

use Illuminate\Database\Seeder;

class GoodsSpecValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['value' => '墨岩黑', 'goods_spec_id' => 1],
            ['value' => '亮瓷白', 'goods_spec_id' => 1],
            ['value' => '6GB+128GB', 'goods_spec_id' => 2],
            ['value' => '8GB+128GB', 'goods_spec_id' => 2],
            ['value' => '8GB+256GB', 'goods_spec_id' => 2],
        ];
        DB::table('goods_spec_values')->insert($data);
    }
}
