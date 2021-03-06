<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  protected $guarded = [];

  public function project()
  {
    return $this->belongsTo('App\Project');
  }

  public function tag()
  {
    return $this->belongsTo('App\Tag');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
