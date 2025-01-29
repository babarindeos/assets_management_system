<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['organ_id', 'name', 'code'];

    public function organ()
    {
        return $this->belongsTo(Organ::class, 'organ_id', 'id');
    }

    public function users()
    {
        return $this->hasMany(UserLocation::class, 'location_id', 'id');
    }
    
}
