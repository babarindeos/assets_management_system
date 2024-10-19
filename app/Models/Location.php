<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['location_type_id', 'name', 'code'];

    public function location_type()
    {
        return $this->belongsTo(LocationType::class, 'location_type_id', 'id');
    }
}
