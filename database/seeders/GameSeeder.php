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
            'title' => 'あつまれ動物の森',
            'description' => '無人島ではじまる、新生活',
            'release_date' => 20200320,
            'genre' => 'シュミレーション',
            'players' => '1人',
            'offical_url' => 'https://www.nintendo.co.jp/switch/acbaa/index.html',
            'agency' => '任天堂',
            'is_new' => 0,
            'is_attention' => 1,
            'is_recommend' => 0,
        ]);

        Game::create([
            'title' => 'スプラトゥーン3',
            'description' => '大自然で! 大都会で! さらに広がるナワバリバトル!',
            'release_date' => 20220909,
            'genre' => 'アクション、シューテング',
            'players' => '1人',
            'offical_url' => 'https://store-jp.nintendo.com/list/software/70010000046394.html',
            'agency' => '任天堂',
            'is_new' => 1,
            'is_attention' => 1,
            'is_recommend' => 1,
        ]);

        Game::create([
            'title' => 'ポケットモンスター バイオレット ',
            'description' => '『ポケットモンスター』シリーズはオープンワールドへ。',
            'release_date' => 20221118,
            'genre' => 'アクション',
            'players' => '２人',
            'offical_url' => 'https://www.pokemon.co.jp/ex/sv/ja/',
            'agency' => '任天堂',
            'is_new' => 1,
            'is_attention' => 1,
            'is_recommend' => 0,
        ]);

    }
}