<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            
            'created_at' => '2019-5-1',
            'name' => 'نبية الشاطر',
            'avatar' => 'images/avatars/studentDefault.png',
            'national_id' => '52014620033687',
            'phone' => '01046552101',
            'email' => 'nabeh@gmail.com',
            'level_id' => 32,
            'classroom' => 2,
            'birthdate' => '2005-4-6',
            'academic_year' => '2017/2018',
            'monthly_evaluation' => '91',
            'religion' => 'مسلم',
            'fees' => 'اقساط',
            'nationality' => 'مصر',
            'residence_status' => 'مقيم',
            'section' => 'عربي',
            'gender' => 'ذكر',
            'enrollment_status' => 'مستجد',
            'school_enrollment_date' => '2011-6-6',
            'the_health' => 'بولاق الدكرور',
            'birthcertificate_enrollment_no' => 25410,
            'building_num' => 3,
            'st_name' => 'علي النحاس',
            'region' => 'بولاق الدكرور',
            'city' => 'القاهرة',
            
            


            'parent_name' => 'الشاطر زكي الشاطر',
            'parent_national_id' => '52014620033687',
            'parent_phone' => '01046552101',
            'parent_email' => 'nabeh@gmail.com',
            'parent_qualification' => 'بكالريوس دار علوم',
            'parent_social_status' => 'مطلق',
            'parent_job' => 'مدير شركة ملابس',
        ]);
    }
}
