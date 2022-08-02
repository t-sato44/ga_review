<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mypage;

class MypageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mypage::create([
            'user_id' => 1,
            'self_info' => 'こんにちは',
            'sex' => 1,
            'area' => 1,
            'tel' => '090-1111-2222',
            'twitter' => '@ffffff',
        ]);

        Mypage::create([
            'user_id' => 2,
            'self_info' => 'ゲームのレヴューします！',
            'sex' => 2,
            'area' => 5,
            'tel' => '090-3333-4444',
            'twitter' => '@aaaaaa',
        ]);
    }
}
