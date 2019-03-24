<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'name' => '平台超级管理员','type'=>1],
            ['id' => 2, 'name' => '平台普通管理员','type'=>1],
            ['id' => 3, 'name' => '商户超级管理员','type'=>2],
        ];
        \App\Models\Role::insert($data);
    }
}
