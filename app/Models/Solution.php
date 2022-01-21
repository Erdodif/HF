<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    use HasFactory;
    public function assignment():Assignment{
        return $this->belongsTo(Assignment::class)->first();
    }
    public function user():User{
        return $this->belongsTo(User::class)->first();
    }

}
