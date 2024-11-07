<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    use HasFactory;

    protected $fillable = ['asset_id', 
                            'maintenance_type', 
                            'priority_level', 
                            'description', 
                            'assigned_personnel',
                            'scheduled_date_time',
                            'requirements',
                            'user_id'];

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id', 'id');
    }
}
