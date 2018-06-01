<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ConfigTableData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $configs = [
            [
                'max_student_per_class' => 40,
                'max_student_age' => 20,
                'min_student_age' => 15,
                'pass_condition_score' => 5,
                'numb_of_subject' => 9,
            ]
        ];
        DB::table('configurations')->insert($configs);

    }
}
