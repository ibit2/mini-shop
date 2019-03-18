<?php

use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['user_id'=>1,'role_id'=>1],
            ['user_id'=>1,'role_id'=>2],
        ];
        DB::table('user_roles')->insert($data);
    }
}
