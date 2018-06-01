<?php

use Illuminate\Database\Seeder;

class RoleTableData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'role_name' => 'Quản trị viên'
            ],
            [
                'role_name' => 'Người dùng'
            ],
        ];
        DB::table('roles')->insert($roles);
    }
}
