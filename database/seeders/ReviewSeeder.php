<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review::create([
            'game_id' => 1,
            'user_id' => 1,
            'review' => 'aaa',
            'score' => 3,
            'graphic' => 1,
            'volume' => 1,
            'sound' => 1,
            'story' => 1,
            'comfort' => 1, 
        ]);
        Review::create([
            'game_id' => 2,
            'user_id' => 1,
            'review' => 'bbb',
            'score' => 3,
            'graphic' => 2,
            'volume' => 1,
            'sound' => 3,
            'story' => 3,
            'comfort' => 1, 
        ]);
        Review::create([
            'game_id' => 3,
            'user_id' => 1,
            'review' => 'ccc',
            'score' => 3,
            'graphic' => 2,
            'volume' => 1,
            'sound' => 3,
            'story' => 2,
            'comfort' => 1, 
        ]);
    }
}
