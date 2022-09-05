<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $guarded = [
        'id'
      ];

    protected $fillable = [
        'name', 'detail', 'fee','imgpath','store_no','category'
    ];
}
