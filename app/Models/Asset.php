<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid', 
        'userlocation_id',
        'category_id',
        'description',
        'item',
        'description',
        'purchase_date',
        'supplier', 
        'cost',
        'life_span',
        'depreciation_rate',
        'disposal_date',
        'disposal_revenue',
        'dispose_authority',
        'comment',
        'user_id'
    ];

    public function location()
    {
        return $this->belongsTo(UserLocation::class, 'userlocation_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(AssetCategory::class, 'category_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
