<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    public function owner(): User
    {
        return $this->belongsTo(User::class, 'owner_id')->first();
    }
    public function getClass(): Classes
    {
        return $this->belongsTo(Classes::class, 'class_id')->first();
    }
    public function solutions(): Collection
    {
        return $this->hasMany(Solution::class)->get();
    }
    public function assignedUsers(): Collection
    {
        return $this->getClass()->members();
    }
    public function isEnded(): bool
    {
        return Carbon::now()->gt($this->due);
    }
    public function isClosed(): bool
    {
        return $this->isEnded() && ($this->last_due === null  || Carbon::now()->gt($this->last_due));
    }
}
