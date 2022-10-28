<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especies extends Model
{
    use HasFactory;

    public function animal() {
        return $this->hasMany(Animal::class);
    }
}
