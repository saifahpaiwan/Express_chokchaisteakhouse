<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product_item_details extends Model
{
    use HasFactory;
    use SoftDeletes; 
    protected $fillable = [
        'product_subsid',
        'product_itemsid',
        'tag_id',
        'unit_id',
        'prict', 
        'check_discount', 
        'discount', 
        'weight',  
    ];  
}
