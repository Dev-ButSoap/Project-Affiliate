<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commissions extends Model
{
  protected $fillable = [
    'user_id',
    'order_id',
    'percent',
    'amount',
    'date',
  ];

  public function user()
  {
    return $this->hasOne(User::class, 'id', 'user_id');
  }

  public function order()
  {
    return $this->hasOne(Orders::class, 'id', 'order_id');
  }
}
