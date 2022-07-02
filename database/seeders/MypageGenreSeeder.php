<?php

namespace Database\Seeders;

use App\Models\MypageGenre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MypageGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MypageGenre::create([
            'mypage_id' => 1,
            'genre_id' => 1,
        ]);
    }
}