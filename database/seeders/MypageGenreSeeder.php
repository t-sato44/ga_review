<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mypage;
use App\Models\Genre;

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