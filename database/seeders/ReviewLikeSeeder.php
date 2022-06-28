<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//use App\Models\Review;
//use App\Models\user;

class ReviewLikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReviewLike::create([
            'review_id' => 1,
            'user_id' => 1,
    ]);
    
}
}