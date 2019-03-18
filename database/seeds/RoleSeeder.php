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
            ['id' => 1, 'name' => '超级管理员'],
            ['id' => 2, 'name' => '普通管理员'],
        ];
        \App\Role::insert($data);
    }
}
