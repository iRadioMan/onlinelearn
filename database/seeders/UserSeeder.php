<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fullname' => 'Администратор',
            'login' => 'admin',
            'password' => Hash::make('admin'),
            'is_admin' => true,
        ]);
        DB::table('users')->insert([
            'fullname' => 'Студентов Студент Студентович',
            'login' => 'user1',
            'password' => Hash::make('123123a'),
            'is_admin' => false,
            'group_id' => '1',
        ]);
    }
}
