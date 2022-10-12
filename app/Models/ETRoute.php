<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class ETRoute extends Model
{
    use HasFactory;
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Uuid::generate();
        });
    }
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    protected $table = 'et_routes';
    protected $fillable = ['route_name', 'vendor_id', 'total_vehicles', 'total_destination_km', 'route_location', 'is_permit', 'vehicle_type', 'created_by', 'updated_by'];

    public function vendor()
    {
        return $this->hasOne(ETVendor::class, 'id', 'vendor_id');
    }
}
