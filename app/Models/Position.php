<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function election() { 
        
        return $this->belongsTo(Election::class); 
    }

    public function nominee() { 
        return $this->hasMany(Nominee::class); 
    }
    public function voter() { 
        return $this->hasMany(Voter::class); 
    }
    public function result1() { 
        return $this->hasMany(Result1::class); 
    }
}
