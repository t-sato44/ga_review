<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Game::create([
            'title' => 'aaa',
            'release_date' => 20200102,
            'genre' => 'アクション',
            'players' => 'シングルプレイ',
            'offical_url' => 'ccc.com',
            'agency' => 'SEGA',
            'is_new' => 0,
            'is_attention' => 1,
            'is_recommend' => 0,
        ]);

        Game::create([
            'title' => 'aaa',
            'release_date' => 20200103,
            'genre' => 'パズル',
            'players' => 'マルチプレイ',
            'offical_url' => 'ccc.com',
            'agency' => 'Nintendo',
            'is_new' => 0,
            'is_attention' => 0,
            'is_recommend' => 1,
        ]);

        Game::create([
            'title' => 'aaa',
            'release_date' => 2022-09-12,
            'genre' => 'シューティング',
            'players' => 'マルチプレイ',
            'offical_url' => 'ccc.com',
            'agency' => 'ddd',
            'is_new' => 0,
            'is_attention' => 1,
            'is_recommend' => 0,
        ]);

    }
}