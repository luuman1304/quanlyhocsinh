<?php

use Illuminate\Database\Seeder;

class SemesterOneScoreData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $SemOneScore = array();
        for ($i = 1; $i < 91; $i++) {
            for ($j = 1; $j < 10; $j++) {
                array_push($SemOneScore, [
                    'student_id' => $i,
                    'semester' => 0,
                    'subject_type' => $j,
                    'fifteenmin_exam_score' => rand(0, 10),
                    'fortyfivemin_exam_score' => rand(0, 10)
                ]);
            }
        }

        DB::table('scores')->insert($SemOneScore);
    }
}
