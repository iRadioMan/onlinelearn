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
            'name' => 'Описание компетенции. Обзор основного программного обеспечения',
            'description' => 'В этой теме вы узнаете про основные разделы компетенции по WSSS, а также об основном используемом программном обеспечении для разработки'
        ],
        [
            'name' => 'Проектирование Use-case диаграммы. Определение функциональных возможностей системы',
            'description' => 'В этой теме вы узнаете о проектировании диаграммы вариантов использования (Use-case diagram), а также научитесь определять основные функциональные возможности системы'
        ],
        ]);//
    }
}
