<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result1 extends Model
{
    use HasFactory;
    public function election() {         
        return $this->belongsTo(Election::class); 
    }
    public function position() {         
        return $this->belongsTo(Position::class); 
    }
    public function nominee() {         
        return $this->belongsTo(Nominee::class); 
    }
}
