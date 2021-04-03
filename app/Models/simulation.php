<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simulation extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'cicle',
        'parcels',
        'segment_id',
        'warranty_id',
        'name',
        'cpf/cnpj',
        'email',
        'celphone'
    ];

    protected $hidden = [
        'warranty_id',
        'segment_id'
    ];

    public function warranty()
    {
        return $this->hasOne(Warranty::class, 'id', 'warranty_id')->first();
    }

    public function segment()
    {
        return $this->hasOne(ClientSegment::class, 'id', 'segment_id')->first();
    }
}
