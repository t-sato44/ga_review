<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => '石原さとみ',
            'name_kana' => 'イシハラサトミ',
            'email' => 'ishihara@mail.com',
            'password' => '00000000',
            'birth_date' => '1990-10-12',
            'nickname' => 'サトミン',
            'level' => 15,
            'current_team_id' => 1,
            'profile_photo_path' => '',
        ]);

    }
}