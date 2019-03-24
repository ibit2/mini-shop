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
            ['id'=>1,'pid'=>0,'name'=>'user','display_name'=>'管理员管理','type'=>1],
            ['id'=>2,'pid'=>1,'name'=>'user.list','display_name'=>'管理员列表','type'=>1],
            ['id'=>3,'pid'=>1,'name'=>'user.add','display_name'=>'添加管理员','type'=>1],
            ['id'=>4,'pid'=>1,'name'=>'user.update','display_name'=>'修改管理员','type'=>1],
            ['id'=>5,'pid'=>1,'name'=>'user.delete','display_name'=>'删除管理员','type'=>1],
            ['id'=>6,'pid'=>0,'name'=>'role','display_name'=>'角色管理','type'=>1],
            ['id'=>7,'pid'=>6,'name'=>'role.list','display_name'=>'角色列表','type'=>1],
            ['id'=>8,'pid'=>6,'name'=>'role.add','display_name'=>'添加角色','type'=>1],
            ['id'=>9,'pid'=>6,'name'=>'role.update','display_name'=>'修改角色','type'=>1],
            ['id'=>10,'pid'=>6,'name'=>'role.delete','display_name'=>'删除角色','type'=>1],
        ];
        \App\Models\Permission::insert($data);
    }
}
