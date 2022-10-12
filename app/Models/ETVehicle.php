<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class ETVehicle extends Model
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

    protected $table = 'et_vehicles';
    protected $fillable = ['vendor_id', 'owner_id', 'route_id', 'bus_no', 'fitness', 'tax_token', 'documents', 'status', 'road_permit', 'created_by', 'updated_by'];
}
