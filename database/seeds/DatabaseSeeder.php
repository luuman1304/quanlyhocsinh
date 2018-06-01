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
       $this->call(UserTableData::class);
       $this->call(ConfigTableData::class);
       $this->call(ClassesTableData::class);
       $this->call(RoleTableData::class);
    }
}
