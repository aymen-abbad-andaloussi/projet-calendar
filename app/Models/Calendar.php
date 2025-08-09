<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $fillable = [
        "start",
        "end",
        "user_id",
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
