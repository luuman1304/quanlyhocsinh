<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTableData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Luu Gia Man',
                'email' => 'admin1@yahoo.com',
                'role_id' => 1,
                'password' => bcrypt('123456'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Nguyen Xuan Binh',
                'email' => 'admin2@yahoo.com',
                'role_id' => 1,
                'password' => bcrypt('123456'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Ho Nhat Tuong',
                'email' => 'admin3@yahoo.com',
                'role_id' => 1,
                'password' => bcrypt('123456'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Nguyen Dang My Ngoc',
                'email' => 'admin4@yahoo.com',
                'role_id' => 1,
                'password' => bcrypt('123456'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Bui Minh Dang',
                'email' => 'admin5@yahoo.com',
                'role_id' => 1,
                'password' => bcrypt('123456'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Nguyen Van A',
                'email' => 'user@yahoo.com',
                'role_id' => 2,
                'password' => bcrypt('123456'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];
        DB::table('users')->insert($users);

    }
}
