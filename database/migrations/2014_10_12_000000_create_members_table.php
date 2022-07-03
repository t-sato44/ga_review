<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('members', function (Blueprint $table) {
			$table->id();
			$table->string('name')->comment('会員名');
			$table->string('name_kana')->comment('会員名フリガナ');
			$table->string('email')->unique()->comment('メールアドレス');
			$table->timestamp('email_verified_at')->nullable()->comment('メール確認');
			$table->string('password')->comment('パスワード');
			$table->date('birth_date')->comment('誕生日');
			$table->string('nickname')->comment('ニックネーム');
			$table->integer('level')->comment('レベル');
			$table->rememberToken()->comment('ログイン省略トークン');
			$table->foreignId('current_team_id')->nullable();
			$table->string('profile_photo_path', 2048)->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('members');
	}
};
