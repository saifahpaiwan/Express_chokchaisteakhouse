<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product_items extends Model
{
    use HasFactory;
    use SoftDeletes; 
    protected $fillable = [
        'product_subsid',
        'type_id',
        'sorting',
        'name_th', 
        'name_en', 
        'detail', 
        'title_topic',
        'tag_id',  
        'price_range',
        'users_id',
    ];   
}
