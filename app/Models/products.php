<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';


    protected $fillable = [
        'name',
        'part_id',
        'brand_id',
    ];
}
