<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::create([
            'name' => 'RPG',
        ]);

        Genre::create([
            'name' => 'MMO、シューティング',
        ]);

        Genre::create([
            'name' => 'シューティング',
        ]);


    }
}
