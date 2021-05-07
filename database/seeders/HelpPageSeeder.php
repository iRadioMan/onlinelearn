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
            ]
        ]);
    }
}
