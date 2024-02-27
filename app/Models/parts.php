<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parts extends Model
{
    use HasFactory;

    protected $primaryKey = 'part_id';


    protected $fillable = [
        'name',
    ];

}
