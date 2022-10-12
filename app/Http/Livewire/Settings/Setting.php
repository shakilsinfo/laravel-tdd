<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;
use App\Models\ETFareSetting;
use Illuminate\Support\Facades\Auth;

class Setting extends Component
{
    public $gas_fare_per_km, $diesel_fare_per_km, $min_fare, $special_fare, $fare_id;
    protected function rules()
    {
        return [
            'gas_fare_per_km' => 'required',
            'diesel_fare_per_km' => 'required',
            'min_fare' => 'required',
            'special_fare' => 'required',
        ];
    }
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function updateOrCreateTicketFare()
    {
        $validatedData = $this->validate();
        if ($validatedData) {
            $flight = ETFareSetting::updateOrCreate(
                ['id' => $this->fare_id],
                [
                    'gas_fare_per_km' => $validatedData['gas_fare_per_km'],
                    'diesel_fare_per_km' => $validatedData['diesel_fare_per_km'],
                    'min_fare' => $validatedData['min_fare'],
                    'special_fare' => $validatedData['special_fare'],
                    'updated_by' => 'admin',
                ]
            );
        }
        $this->dispatchBrowserEvent('swal:success', [
            'title' => 'Fare Settings Updated Successfully!',
        ]);
        $this->dispatchBrowserEvent('close-modal');
        $this->resetFareSettingsValue();
    }
    public function editFare(string $id)
    {
        $fareSetting = ETFareSetting::find($id);
        if ($fareSetting) {
            $this->fare_id = $fareSetting->id;
            $this->gas_fare_per_km = $fareSetting->gas_fare_per_km;
            $this->diesel_fare_per_km = $fareSetting->diesel_fare_per_km;
            $this->min_fare = $fareSetting->min_fare;
            $this->special_fare = $fareSetting->special_fare;
        } else {
            $this->fare_id = 0;
            $this->gas_fare_per_km = '';
            $this->diesel_fare_per_km = '';
            $this->min_fare = '';
            $this->special_fare = '';
        }
    }
    public function closeModal()
    {
        $this->fare_id = 0;
        $this->gas_fare_per_km = '';
        $this->diesel_fare_per_km = '';
        $this->min_fare = '';
        $this->special_fare = '';
    }
    public function setFareSettingsValue($ticketFare)
    {
        $this->gas_fare_per_km = $ticketFare['gas_fare_per_km'];
        $this->diesel_fare_per_km = $ticketFare['gas_fare_per_km'];
        $this->min_fare = $ticketFare['min_fare'];
        $this->special_fare = $ticketFare['special_fare'];
    }
    public function resetFareSettingsValue()
    {
        $this->gas_fare_per_km = '';
        $this->diesel_fare_per_km = '';
        $this->min_fare = '';
        $this->special_fare = '';
    }
    public function render()
    {
        $ticketFare = ETFareSetting::orderBy('id', 'DESC')->first();
        return view('livewire.settings.setting', ['ticketFare' => $ticketFare]);
    }
}
