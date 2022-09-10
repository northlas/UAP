<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function review(){
        return $this->hasMany(Review::class);
    }

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
}
