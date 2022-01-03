<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    use HasFactory;
    public $timestamps = false;

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
