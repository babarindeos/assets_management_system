<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ministry extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code'];


    public function staff()
    {
        return $this->hasMany(Staff::class, 'ministry_id', 'id');
    }
}
