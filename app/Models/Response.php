<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    public $fillable = ['solution_id','text','points'];

    public function solution():Solution{
        return $this->belongsTo(Solution::class)->first();
    }
}
