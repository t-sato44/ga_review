<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
	use HasFactory;

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function game()
	{
		return $this->belongsTo(Game::class);
	}

	public function device()
	{
		return $this->belongsToMany(Device::class);
	}
}
