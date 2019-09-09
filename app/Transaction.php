<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $incrementing = false;

    protected $fillable = ['order_id', 'user_id', 'item_id', 'quantity'];
}
