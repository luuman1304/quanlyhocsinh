<?php

use Illuminate\Database\Seeder;

class ClassesTableData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = [
            [
                'class_name' => '10A1'
            ],
            [
                'class_name' => '10A2'
            ],
            [
                'class_name' => '10A3'
            ],
            [
                'class_name' => '10A4'
            ],
            [
                'class_name' => '11A1'
            ],
            [
                'class_name' => '11A2'
            ],
            [
                'class_name' => '11A3'
            ],
            [
                'class_name' => '12A1'
            ],
            [
                'class_name' => '12A2'
            ],

        ];
        DB::table('classes')->insert($classes);
    }
}
