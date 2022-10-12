<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class ETVendor extends Model
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

    protected $table = 'et_vendors';
    protected $fillable = ['name', 'email', 'contact_no', 'address', 'agreement_paper', 'total_vehicle', 'total_owner', 'others_info', 'created_by', 'updated_by'];
}
