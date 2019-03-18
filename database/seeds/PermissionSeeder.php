<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id'=>1,'pid'=>0,'name'=>'','display_name'=>'管理员管理'],
            ['id'=>2,'pid'=>1,'name'=>'','display_name'=>'管理员列表'],
            ['id'=>3,'pid'=>1,'name'=>'','display_name'=>'添加管理员'],
            ['id'=>4,'pid'=>1,'name'=>'','display_name'=>'修改管理员'],
            ['id'=>5,'pid'=>1,'name'=>'','display_name'=>'删除管理员'],
            ['id'=>6,'pid'=>0,'name'=>'','display_name'=>'角色管理'],
            ['id'=>7,'pid'=>6,'name'=>'','display_name'=>'角色列表'],
            ['id'=>8,'pid'=>6,'name'=>'','display_name'=>'添加角色'],
            ['id'=>9,'pid'=>6,'name'=>'','display_name'=>'修改角色'],
            ['id'=>10,'pid'=>6,'name'=>'','display_name'=>'删除角色'],
        ];
        \App\Permission::insert($data);
    }
}
