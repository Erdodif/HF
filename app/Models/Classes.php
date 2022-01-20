<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classes extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function members():Collection{
        return $this->hasMany(User::class)->get();
    }
    public function assignments():Collection{
        return $this->HasMany(Assignment::class)->get();
    }
}
