<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
  protected $fillable = [
    'user_id',
    'product_ids',
    'amount',
    'date',
  ];

  public function user()
  {
    return $this->hasOne(User::class, 'id', 'user_id');
  }

  public function product()
  {
    return $this->hasOne(Products::class, 'id', 'product_ids');
  }
}
