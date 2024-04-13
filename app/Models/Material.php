<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    const  ACTIVE = 0;

    const  INACTIVE = 1;

    protected $fillable  = [
        'name',
        'serial',
        'modal',
        'is_active',
        'img',
    ];
        

}
