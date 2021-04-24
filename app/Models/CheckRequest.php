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
    

    public function Person(){
        return $this->hasOne(Person::class, 'id', 'person_id');
    }

    public function Check(){
        return $this->hasOne(Check::class, 'id', 'check_id');
    }
}
