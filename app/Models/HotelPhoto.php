<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelPhoto extends Model
{
    use HasFactory;

    protected $guarded = false;
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
