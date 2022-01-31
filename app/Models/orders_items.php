<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class orders_items extends Model
{
    use HasFactory;
    use SoftDeletes; 
    protected $fillable = [ 
        'order_id', 
        'product_subsid',
        'product_itemsid',
        'quantity',
        'price_total',
    ];  
}
