<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(MerchantSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(MerchantRoleSeeder::class);
        $this->call(RolePermissionSeeder::class);
        $this->call(MemberSeeder::class);
        $this->call(GoodsCategorySeeder::class);
        $this->call(GoodsSeeder::class);
    }
}
