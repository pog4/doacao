<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    
    
    public function especie() {
        return $this->belongsTo(Especies::class,'id_esp','id');
    }

}