<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Member::create([
			'name' => '近藤あつし',
			'name_kana' => 'コンドウアツシ',
			'email' => 'kondo@mail.com',
			'password' => bcrypt('00000000'),
			'birth_date' => '1990-10-12',
			'nickname' => 'atsucon',
			'level' => 2,
			'profile_photo_path' => '',
		]);
	}
}
