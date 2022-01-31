<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class remote_area extends Model
{
    use HasFactory;
    use SoftDeletes; 
    protected $fillable = [ 
        'zipcode', 
    ]; 
}
