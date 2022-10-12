<?php

namespace App\Http\Livewire\Vehicles\Routes;

use Livewire\Component;
use App\Models\ETVendor;
use App\Models\ETRoute;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Routes extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $route_name, $vendor_id, $total_vehicles, $total_destination_km, $route_location, $is_permit = 1, $vehicle_type = 1, $route_id;
    public $vendors = [];
    public $search = '';
    public $pagination = 25;
    public $orderBy = 'vendor_id';
    public $orderDirection = 'asc';

    public function setPagination(string $pagination)
    {
        $this->pagination = $pagination;
    }

    public function setOrderBy(string $orderBy)
    {
        $this->orderBy = $orderBy;
        if ($this->orderDirection == 'asc') {
            $this->orderDirection = 'desc';
        } else {
            $this->orderDirection = 'asc';
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected function rules()
    {
        return [
            'route_name' => 'required|string',
            'vendor_id' => 'required',
            'total_vehicles' => 'required',
            'total_destination_km' => 'required',
            'route_location' => 'required|string',
            'is_permit' => 'required',
            'vehicle_type' => 'required',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function loadVendor()
    {
        $this->vendors = ETVendor::select('id', 'name')->get();
    }

    public function createRoute($validatedData)
    {
        $data['route_name'] = $validatedData['route_name'];
        $data['vendor_id'] = $validatedData['vendor_id'];
        $data['total_vehicles'] = $validatedData['total_vehicles'];
        $data['total_destination_km'] = $validatedData['total_destination_km'];
        $data['route_location'] = $validatedData['route_location'];
        $data['is_permit'] = $validatedData['is_permit'];
        $data['vehicle_type'] = $validatedData['vehicle_type'];
        $data['created_by'] = Auth::user()->name;
        $data['updated_by'] = Auth::user()->name;
        ETRoute::create($data);
    }

    public function saveRoute()
    {
        $validatedData = $this->validate();
        $this->createRoute($validatedData);
        $this->dispatchBrowserEvent('swal:success', [
            'title' => 'Route Created Successfully!',
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function editRoute($route_id)
    {
        $this->vendors = ETVendor::select('id', 'name')->get();
        $route = ETRoute::find($route_id);
        if ($route) {
            $this->route_id = $route->id;
            $this->route_name = $route->route_name;
            $this->vendor_id = $route->vendor_id;
            $this->total_vehicles = $route->total_vehicles;
            $this->total_destination_km = $route->total_destination_km;
            $this->route_location = $route->route_location;
            $this->is_permit = $route->is_permit;
            $this->vehicle_type = $route->vehicle_type;
        } else {
            return redirect()->to('/vehicles/routes');
        }
    }

    public function updateRoute()
    {
        $validatedData = $this->validate();
        ETRoute::where('id', $this->route_id)->update([
            'route_name' => $validatedData['route_name'],
            'vendor_id' => $validatedData['vendor_id'],
            'total_vehicles' => $validatedData['total_vehicles'],
            'total_destination_km' => $validatedData['total_destination_km'],
            'route_location' => $validatedData['route_location'],
            'is_permit' => $validatedData['is_permit'],
            'vehicle_type' => $this->vehicle_type,
            'updated_by' => Auth::user()->name,
        ]);
        $this->dispatchBrowserEvent('swal:success', [
            'title' => 'Route Updated Successfully!',
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteRoute(int $route_id)
    {
        $this->route_id = $route_id;
    }

    public function destroyRoute()
    {
        ETRoute::find($this->route_id)->delete();
        $this->dispatchBrowserEvent('swal:success', [
            'title' => 'Route Deleted Successfully!',
        ]);
        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->route_name = '';
        $this->vendor_id = '';
        $this->total_vehicles = '';
        $this->total_destination_km = '';
        $this->route_location = '';
        $this->is_permit = '';
        $this->vehicle_type = '';
        $this->vendors = [];
    }

    public function resetInput()
    {
        $this->route_name = '';
        $this->vendor_id = '';
        $this->total_vehicles = '';
        $this->total_destination_km = '';
        $this->route_location = '';
        $this->is_permit = '';
        $this->vehicle_type = '';
    }

    public function render()
    {
        $routes = ETRoute::where('route_name', 'like', '%' . $this->search . '%')
            ->orWhere('route_location', 'like', '%' . $this->search . '%')
            ->orWhere('created_by', 'like', '%' . $this->search . '%')
            ->orWhere('updated_by', 'like', '%' . $this->search . '%')
            ->orderBy($this->orderBy, $this->orderDirection)
            ->orderBy('updated_at', 'desc')
            ->paginate($this->pagination);
        return view('livewire.vehicles.routes.routes', ['routes' => $routes]);
    }
}
