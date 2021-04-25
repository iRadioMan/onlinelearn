<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quiz_results')->insert([
            [
                'user_id' => 2,
                'lesson_id' => 1,
                'correct_percentage' => '100'
            ],
            [
                'user_id' => 2,
                'lesson_id' => 2,
                'correct_percentage' => '100'
            ],
            [
                'user_id' => 2,
                'lesson_id' => 3,
                'correct_percentage' => '100'
            ],
            [
                'user_id' => 2,
                'lesson_id' => 4,
                'correct_percentage' => '100'
            ],
            [
                'user_id' => 2,
                'lesson_id' => 5,
                'correct_percentage' => '100'
            ]
        ]);
    }
}