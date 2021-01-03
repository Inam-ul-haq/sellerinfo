<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instock extends Model
{
    use HasFactory;
    protected $fillable = [

        'url',
        'product',
        'store',
        'status',
        'active',
        'user_id'
    ];
}
