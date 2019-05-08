<?php

use Illuminate\Database\Seeder;

class WorkersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workers')->insert([
            'created_at' => '2010-02-04 00:00:00',
            'name' => 'محي الشرقاوي',
            'national_id' => '52014620033687',
            'phone' => '01046552101',
            'email' => 'mohey@gmail.com',
            'birthdate' => '1975-4-6',
            'social_status' => 'مطلق',
            'religion' => 'مسلم',
            'qualification' => 'دبلوم صنايع',
            'job' => 'حارس امن',
            'salary' => 2000,
            'building_num' => 35,
            'st_name' => 'العطار',
            'region' => 'العتبة',
            'city' => 'القاهرة',
            'country' => 'مصر',
            'avatar' => 'images/avatars/1554815271_download.jpg'
        ]);
    }
}
