<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function organ()
    {
        return $this->hasMany(Organ::class, 'location_type_id', 'id');
    }
}
