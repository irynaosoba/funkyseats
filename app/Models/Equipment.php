<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    public function seat()
    {
        return $this->belongsToMany(SeatEquipment::class);
    }
}
