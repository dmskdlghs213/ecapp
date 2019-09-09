<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    
    public $incrementing = false;

    protected $fillable = ['user_id', 'item_id', 'quantity'];
}
