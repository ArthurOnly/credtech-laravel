<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        "value",
        "cicle",
        "parcels",
        "warranty_id",
        "segment_id"
    ];

    protected $hidden = [
        'updated_at'
    ];

    public function Warranty(){
        return $this->hasOne(Warranty::class, 'id', "warranty_id");
    }

    public function Segment(){
        return $this->hasOne(ClientSegment::class, 'id', "segment_id");
    }

}
