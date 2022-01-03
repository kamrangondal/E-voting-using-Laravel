<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nominee extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function election() {        
        return $this->belongsTo(Election::class); 
    }
    public function position() {       
        return $this->belongsTo(Position::class); 
    }
    public function voter() { 
        return $this->hasMany(Voter::class); 
    }
    public function result1() { 
        return $this->hasMany(Result1::class); 
    }
}
