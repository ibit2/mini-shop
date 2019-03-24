<?php

use Illuminate\Database\Seeder;

class MerchantRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['merchant_id'=>1,'role_id'=>3],
            ['merchant_id'=>1,'role_id'=>3],
        ];
        DB::table('merchant_roles')->insert($data);
    }
}
