<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    use HasFactory;

    public $fillable = ['assignment_id', 'user_id', 'link'];

    public function solutions() {
        return $this->hasMany(Response::class,'solution_id');
    }


    public function assignment(): Assignment
    {
        return $this->belongsTo(Assignment::class)->first();
    }
    public function user(): User
    {
        return $this->belongsTo(User::class)->first();
    }
    public function hasResponse(): bool
    {
        return $this->solutions->count() > 0;
    }
    public function response():Response
    {
        return $this->solutions->first();
    }
}
