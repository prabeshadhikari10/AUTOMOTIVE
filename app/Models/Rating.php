<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';

    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}



