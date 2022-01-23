<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    public $fillable = ['owner_id','title','description','class_id','max_points','due','last_due'];

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
        return $this->hasMany(Solution::class,'assignment_id')->get();
    }
    public function assignedUsers(): Collection
    {
        return $this->getClass()->members();
    }
    public function missing():Collection
    {
        $collection = new Collection();
        $this->solutions()->each(
            function(Solution $item, $key) use(&$collection){
                $collection->add($item->user());
            }
        );
        return $this->assignedUsers()->whereNotIn('id',$collection->pluck('id'));
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
