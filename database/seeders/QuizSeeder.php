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
                'description' => 'Как объявляется переменная в C#?'
            ],
            [
                'lesson_id' => 1,
                'description' => 'Можно ли объявить две переменные с одинаковыми именами?'
            ],
            [
                'lesson_id' => 1,
                'description' => 'Какие типы переменных существуют в C#?'
            ],
        ]);
        DB::table('question_options')->insert([
            [ // QUESTION 1
                'correct' => false,
                'question_id' => 1,
                'description' => "variable a;"
            ],
            [
                'correct' => false,
                'question_id' => 1,
                'description' => "a: variable;"
            ],
            [
                'question_id' => 1,
                'description' => "var a;",
                'correct' => true
            ], // END QUESTION 1 

            [ // QUESTION 2
                'correct' => false,
                'question_id' => 2,
                'description' => "Если очень хочется, то можно"
            ],
            [
                'question_id' => 2,
                'description' => 'Нет',
                'correct' => true
            ],
            [
                'correct' => false,
                'question_id' => 2,
                'description' => 'Да',
                
            ], //END QUESTION 2

            [ // QUESTION 3
                'question_id' => 3,
                'description' => 'int',
                'correct' => true
            ],
            [
                'question_id' => 3,
                'description' => 'string',
                'correct' => true
            ],
            [
                'correct' => false,
                'question_id' => 3,
                'description' => 'word',
                
            ], //END QUESTION 3
        ]);
    }
}
