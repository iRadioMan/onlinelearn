<?php

namespace Database\Seeders;

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
        $this->call([
            AppSettingsSeeder::class,
            GroupStatusSeeder::class,
            GroupSeeder::class,
            UserSeeder::class,
            LessonSeeder::class,
            QuizSeeder::class
        ]);    
    }
}
