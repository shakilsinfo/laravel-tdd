<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class ETVendorOwner extends Model
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

    protected $table = 'et_vendor_owners';
    protected $fillable = ['vendor_id', 'owner_name', 'owner_email', 'owner_phone', 'owner_address', 'vehicle_name', 'photo', 'status', 'total_vehicles', 'created_by', 'updated_by'];

    public function vendor()
    {
        return $this->hasOne(ETVendor::class, 'id', 'vendor_id');
    }
}
