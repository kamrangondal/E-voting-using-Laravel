<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory;

    public function position() { 
        return $this->hasMany(Position::class); 
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
