<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GlossarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('glossary')->insert([
            [
                'term' => 'Кекувалка',
                'definition' => 'Процесс кекания пердоловка',
            ],
            [
                'term' => 'Рыгаловка',
                'definition' => 'Процесс рыгания',
            ]
        ]);
    }
}
