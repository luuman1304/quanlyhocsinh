<?php

use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StudentTableData::class);
        $this->call(SemesterOneScoreData::class);
        $this->call(SemesterTwoScoreData::class);
    }
}
