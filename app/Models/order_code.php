<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class order_code extends Model
{
    use HasFactory;
    use SoftDeletes; 
    protected $fillable = [ 
        'id', 
        'order_id',
        'user_id', 
        'code', 
    ];  
}
