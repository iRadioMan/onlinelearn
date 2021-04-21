<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            [
                'lesson_id' => 1,
                'description' => 'Что не входит в основные темы цикла занятий?'
            ],
            [
                'lesson_id' => 1,
                'description' => 'Какие средства используются для разработки?'
            ],
            [
                'lesson_id' => 1,
                'description' => 'Что такое AVD?'
            ],
        ]);
        DB::table('question_options')->insert([
            [ // QUESTION 1
                'correct' => false,
                'question_id' => 1,
                'description' => "Анализ и проектирование программных решений"
            ],
            [
                'correct' => false,
                'question_id' => 1,
                'description' => "Разработка настольного и мобильного приложений"
            ],
            [
                'question_id' => 1,
                'description' => "Разработка веб-приложения",
                'correct' => true
            ], // END QUESTION 1 

            [ // QUESTION 2
                'correct' => true,
                'question_id' => 2,
                'description' => "Microsoft Visual Studio"
            ],
            [
                'correct' => false,
                'question_id' => 2,
                'description' => 'Mono Develop'
            ],
            [
                'correct' => true,
                'question_id' => 2,
                'description' => 'Android Studio',
                
            ], //END QUESTION 2

            [ // QUESTION 3
                'question_id' => 3,
                'description' => 'Android Version Descriptor',
                'correct' => false
            ],
            [
                'correct' => true,
                'question_id' => 3,
                'description' => 'Android Virtual Device'                
            ],
            [
                'correct' => false,
                'question_id' => 3,
                'description' => 'Android Virtual Demo',
                
            ], //END QUESTION 3
        ]);
    }
}
