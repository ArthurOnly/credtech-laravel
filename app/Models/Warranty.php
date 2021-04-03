<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'warranty_name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
