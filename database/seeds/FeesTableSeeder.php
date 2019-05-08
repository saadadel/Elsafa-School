<?php

use Illuminate\Database\Seeder;

class FeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fees = [
            [
                'student_id' => 1,
                'method' => 'اقساط',
                'date' => '2019-3-2',
                'amount' => 1000
            ],
            [
                'student_id' => 1,
                'method' => 'اقساط',
                'date' => '2019-2-6',
                'amount' => 750
            ],
            [
                'student_id' => 1,
                'method' => 'اقساط',
                'date' => '2019-4-14',
                'amount' => 1500
            ]
        ];

        DB::table('fees')->insert($fees);
    }
}
