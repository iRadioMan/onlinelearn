<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lessons')->insert([
        [
            'name' => 'Переменные',
            'description' => 'В этой теме вы узнаете, что такое переменные'
        ],
        [
            'name' => 'Константы',
            'description' => 'В этой теме вы узнаете, что такое константы'
        ],
        [
            'name' => 'Массивы',
            'description' => 'В этой теме вы узнаете, что такое массивы'
        ],
        ]);//
    }
}
