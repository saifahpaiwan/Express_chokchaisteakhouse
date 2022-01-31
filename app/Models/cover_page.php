<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cover_page extends Model
{
    use HasFactory;
    use SoftDeletes; 
    protected $fillable = [ 
        'link',
        'title',
        'imgname',
    ]; 
}
