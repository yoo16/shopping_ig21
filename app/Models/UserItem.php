<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserItem extends Model
{

    protected $fillable = [
        'amount',
        'user_id',
        'item_id',
        'price',
        'tax',
    ];

    protected $guraded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
