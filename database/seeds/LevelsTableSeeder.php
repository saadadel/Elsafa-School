<?php

use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = [
            [
                'id' => 11,
                'level' => 'الروضة',
                'name' => 'الصف الاول',
                'number_of_classes' => 2,
                'fees' => 1500
            ],
            [
                'id' => 12,
                'level' => 'الروضة',
                'name' => 'الصف الثاني',
                'number_of_classes' => 2,
                'fees' => 1500
            ],

            [
                'id' => 21,
                'level' => 'الإبتدائية',
                'name' => 'الصف الاول',
                'number_of_classes' => 4,
                'fees' => 3000
            ],
            [
                'id' => 22,
                'level' => 'الإبتدائية',
                'name' => 'الصف الثاني',
                'number_of_classes' => 4,
                'fees' => 3000
            ],
            [
                'id' => 23,
                'level' => 'الإبتدائية',
                'name' => 'الصف الثالث',
                'number_of_classes' => 4,
                'fees' => 3000
            ],
            [
                'id' => 24,
                'level' => 'الإبتدائية',
                'name' => 'الصف الرابع',
                'number_of_classes' => 4,
                'fees' => 3000
            ],
            [
                'id' => 25,
                'level' => 'الإبتدائية',
                'name' => 'الصف الخامس',
                'number_of_classes' => 4,
                'fees' => 3000
            ],
            [
                'id' => 26,
                'level' => 'الإبتدائية',
                'name' => 'الصف السادس',
                'number_of_classes' => 4,
                'fees' => 3000
            ],

            [
                'id' => 31,
                'level' => 'الإعدادية',
                'name' => 'الصف الاول',
                'number_of_classes' => 3,
                'fees' => 4000
            ],
            [
                'id' => 32,
                'level' => 'الإعدادية',
                'name' => 'الصف الثاني',
                'number_of_classes' => 3,
                'fees' => 4000
            ],
            [
                'id' => 33,
                'level' => 'الإعدادية',
                'name' => 'الصف الثالث',
                'number_of_classes' => 3,
                'fees' => 4000
            ],

            [
                'id' => 41,
                'level' => 'الثانوية',
                'name' => 'الصف الاول',
                'number_of_classes' => 3,
                'fees' => 5000
            ],
            [
                'id' => 42,
                'level' => 'الثانوية',
                'name' => 'الصف الثاني',
                'number_of_classes' => 3,
                'fees' => 5000
            ],
            [
                'id' => 43,
                'level' => 'الثانوية',
                'name' => 'الصف الثالث',
                'number_of_classes' => 3,
                'fees' => 5000
            ],

        ];

        DB::table('levels')->insert($levels);
        //DB::table('users')->insert($users);
        
    }
}
