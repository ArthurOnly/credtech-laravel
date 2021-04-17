<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        "person_id",
        "check_id"
    ];

    public function person(){
        return $this->hasOne(Person::class, 'id', 'person_id');
    }

    public function check(){
        return $this->hasOne(Check::class, 'id', 'check_id');
    }
}
