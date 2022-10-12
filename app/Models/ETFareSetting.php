<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ETFareSetting extends Model
{
    use HasFactory;
    protected $table = 'et_fare_settings';
    protected $fillable = ['gas_fare_per_km', 'diesel_fare_per_km', 'min_fare', 'special_fare', 'updated_by'];
}
