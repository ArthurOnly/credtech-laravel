<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientSegment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'segment_name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
