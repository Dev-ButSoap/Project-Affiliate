<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commissions extends Model
{
  protected $fillable = [
    'user_id',
    'order_id',
    'amount',
    'date',
  ];
}
