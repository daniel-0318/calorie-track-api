<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class calorieTrack extends Model
{
    use HasFactory;

    protected $fillable = [
        "food",
        "user_id",
        "quantity",
        "calories",
        "dateFood",
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}

