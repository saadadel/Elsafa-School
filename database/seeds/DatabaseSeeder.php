<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LevelsTableSeeder::class);
        $this->call(TeachersTableSeeder::class);
        $this->call(WorkersTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(FeesTableSeeder::class);
    }
}
