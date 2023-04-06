<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function photos()
    {
        return $this->hasMany(RoomPhoto::class);
    }

    public function getRoomList() {
        return Room::pluck('name', 'id')->toArray();
    }

    public function getMainImageUrlAttribute()
    {
        $photos = $this->photos;
        if ($photos->isEmpty()) {
            return null;
        }
        return url('storage/images/' . $photos->pluck('path')->first());
    }
}
