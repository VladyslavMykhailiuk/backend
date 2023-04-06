<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function photos()
    {
        return $this->hasMany(HotelPhoto::class);
    }

    public function getHotelList() {
        return Hotel::pluck('name', 'id')->toArray();
    }

    public function getImageUrlAttribute()
    {
        $photos = $this->photos;
        if($photos->isEmpty()){
            return null;
        }
        $paths = $photos->pluck('path');

        if ($paths->count() === 1) {
            return url('storage/images/' . $paths->first());
        }

        $urls = $paths->map(function ($path) {
            return url('storage/images/' . $path);
        });

        return $urls->toArray();
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
