<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomComment extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
