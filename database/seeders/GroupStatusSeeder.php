<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_request_statuses')->insert([
            ['name' => 'Ожидает подтверждения'],
            ['name' => 'Группа подтверждена'],
            ['name' => 'Заявка отклонена'],
        ]);
    }
}
