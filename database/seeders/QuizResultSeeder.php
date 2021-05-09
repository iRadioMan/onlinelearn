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
            ],
            [
                'user_id' => 2,
                'lesson_id' => 6,
                'correct_percentage' => '100'
            ],
            [
                'user_id' => 2,
                'lesson_id' => 7,
                'correct_percentage' => '100'
            ],
            [
                'user_id' => 2,
                'lesson_id' => 8,
                'correct_percentage' => '100'
            ],
            [
                'user_id' => 2,
                'lesson_id' => 9,
                'correct_percentage' => '100'
            ],
            [
                'user_id' => 2,
                'lesson_id' => 10,
                'correct_percentage' => '100'
            ],
            [
                'user_id' => 2,
                'lesson_id' => 11,
                'correct_percentage' => '100'
            ],
            [
                'user_id' => 2,
                'lesson_id' => 12,
                'correct_percentage' => '100'
            ],
            [
                'user_id' => 2,
                'lesson_id' => 13,
                'correct_percentage' => '100'
            ],
            [
                'user_id' => 2,
                'lesson_id' => 14,
                'correct_percentage' => '100'
            ],
            [
                'user_id' => 2,
                'lesson_id' => 15,
                'correct_percentage' => '100'
            ],
            [
                'user_id' => 2,
                'lesson_id' => 16,
                'correct_percentage' => '100'
            ],
            [
                'user_id' => 2,
                'lesson_id' => 17,
                'correct_percentage' => '100'
            ],
            [
                'user_id' => 2,
                'lesson_id' => 18,
                'correct_percentage' => '100'
            ]
        ]);
    }
}
