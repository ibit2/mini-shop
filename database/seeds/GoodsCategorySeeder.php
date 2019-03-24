<?php

use Illuminate\Database\Seeder;

class GoodsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'pid' => 0, 'name' => '海鲜','merchant_id'=>1],
            ['id' => 2, 'pid' => 1, 'name' => '鱼类','merchant_id'=>1],
            ['id' => 3, 'pid' => 1, 'name' => '贝类','merchant_id'=>1],
            ['id' => 4, 'pid' => 1, 'name' => '虾类','merchant_id'=>1],
            ['id' => 5, 'pid' => 0, 'name' => '水果','merchant_id'=>2],
            ['id' => 6, 'pid' => 5, 'name' => '香蕉','merchant_id'=>2],
            ['id' => 7, 'pid' => 5, 'name' => '苹果','merchant_id'=>2],
            ['id' => 8, 'pid' => 5, 'name' => '橘子','merchant_id'=>2],
        ];
        foreach ($data as $v) {
            \App\Models\GoodsCategory::create($v);
        }

    }
}
