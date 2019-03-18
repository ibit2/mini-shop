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
            ['id' => 1, 'pid' => 0, 'name' => '海鲜'],
            ['id' => 2, 'pid' => 1, 'name' => '鱼类'],
            ['id' => 3, 'pid' => 1, 'name' => '贝类'],
            ['id' => 4, 'pid' => 1, 'name' => '虾类'],
        ];
        foreach ($data as $v) {
            \App\GoodsCategory::create($v);
        }

    }
}
