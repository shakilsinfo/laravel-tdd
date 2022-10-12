<?php

namespace App\Http\Livewire\Vehicles\Vehicles;

use Livewire\Component;
use App\Models\ETVehicle;

class Vehicles extends Component
{
    public function render()
    {
        $vehicles = ETVehicle::all();
        return view('livewire.vehicles.vehicles.vehicles', ['vehicles' => $vehicles]);
    }
}
