<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_groups')->insert([
            ['name' => '11ПО181'],
            ['name' => '9ИСиП171'],
            ['name' => '9ИСиП181'],
        ]);
    }
}
