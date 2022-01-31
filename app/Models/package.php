<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class package extends Model
{
    use HasFactory;
    use SoftDeletes; 
    protected $fillable = [  
        'id',
        'name', 
        'price',
        'shipping_cost1',
        'shipping_cost2',
        'shipping_cost3', 
        'wide',
        'long',
        'high',
    ]; 
}
