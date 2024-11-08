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
                            'service_provider_id',
                            'scheduled_date_time',
                            'duration',
                            'cost',
                            'requirements',
                            'user_id'];

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id', 'id');
    }

    public function service_provider()
    {
        return $this->belongsTo(ServiceProvider::class, 'service_provider_id', 'id');
    }
}
