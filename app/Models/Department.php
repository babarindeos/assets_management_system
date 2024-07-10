<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'college_id',
        'department_name',
        'department_code'
    ];

    public function college(){
        return $this->belongsTo(College::class);
    }
}
