<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HelpPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('helppages')->insert([
            [
                'name' => 'Обучение',
                'main_file' => 'lessons.html'
            ],
            [
                'name' => 'Прохождение тестов',
                'main_file' => 'quizzes.html'
            ],
            [
                'name' => 'Использование глоссария',
                'main_file' => 'glossary.html'
            ],
            [
                'name' => 'Просмотр прогресса',
                'main_file' => 'progress.html'
            ],
            [
                'name' => 'Просмотр и настройка профиля',
                'main_file' => 'profile.html'
            ]
        ]);
    }
}
