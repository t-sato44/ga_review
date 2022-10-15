<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
  use HasFactory;

  /**
   * モデルと関連しているテーブル
   *
   * @var string
   */
  protected $table = 'games';


  public function devices()
  {
    return $this->belongsToMany(Device::class)->withTimestamps();;
  }
}
