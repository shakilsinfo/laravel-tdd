<?php

namespace App\Http\Livewire\Vendors;

use Livewire\Component;
use App\Models\ETVendorOwner;
use App\Models\ETVendor;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class VendorOwner extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    use WithFileUploads;
    public $search = '';
    public $pagination = 25;
    public $orderBy = 'owner_name';
    public $orderDirection = 'asc';
    public $vendors = [];
    public $vendor_id, $owner_name, $owner_email, $owner_phone, $owner_address, $vehicle_name, $total_vehicles, $photo, $vendorOwner_id;

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
            'vendor_id' => 'required',
            'owner_name' => 'required|string',
            'owner_email' => 'required|email',
            'owner_phone' => 'required|string',
            'total_vehicles' => 'required',
            'vehicle_name' => 'required',
            'owner_address' => 'required|string',
            'photo' => 'file|mimes:png,jpg',
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
    public function uploadFile($file)
    {
        $uploadedFile = $file;
        $filename = time() . $uploadedFile->getClientOriginalName();

        Storage::disk('local')->putFileAs(
            'public/vendors',
            $uploadedFile,
            $filename
        );
        return $filename;
    }
    public function createVendorOwner($validatedData)
    {
        $filename = $this->uploadFile($validatedData['photo']);
        $data['vendor_id'] = $validatedData['vendor_id'];
        $data['owner_name'] = $validatedData['owner_name'];
        $data['owner_email'] = $validatedData['owner_email'];
        $data['owner_phone'] = $validatedData['owner_phone'];
        $data['photo'] = $filename;
        $data['total_vehicles'] = $validatedData['total_vehicles'];
        $data['vehicle_name'] = $validatedData['vehicle_name'];
        $data['owner_address'] = $validatedData['owner_address'];
        $data['created_by'] = 'admin';
        $data['updated_by'] = 'admin';
        ETVendorOwner::create($data);
    }
    public function saveVendorOwner()
    {
        $validatedData = $this->validate();
        $this->createVendorOwner($validatedData);
        $this->dispatchBrowserEvent('swal:success', [
            'title' => 'Vendor Owner Added Successfully!',
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
    public function closeModal()
    {
        $this->vendor_id = '';
        $this->owner_name = '';
        $this->owner_email = '';
        $this->owner_phone = '';
        $this->owner_address = '';
        $this->vehicle_name = '';
        $this->total_vehicles = '';
        $this->photo = '';
        $this->vendors = [];
    }
    public function editVendorOwner($vendor_id)
    {
        $this->vendors = ETVendor::select('id', 'name')->get();
        $vendorOwner = ETVendorOwner::find($vendor_id);
        if ($vendorOwner) {
            $this->vendorOwner_id = $vendorOwner->id;
            $this->owner_name = $vendorOwner->owner_name;
            $this->owner_email = $vendorOwner->owner_email;
            $this->owner_phone = $vendorOwner->owner_phone;
            $this->total_vehicles = $vendorOwner->total_vehicles;
            $this->photo = $vendorOwner->photo;
            $this->vehicle_name = $vendorOwner->vehicle_name;
            $this->owner_address = $vendorOwner->owner_address;
            $this->vendor_id = $vendorOwner->vendor_id;
        } else {
            return redirect()->to('/vendor-owners');
        }
    }
    public function updateVendorOwner()
    {
        $validatedData = $this->validate();
        ETVendorOwner::where('id', $this->vendorOwner_id)->update([
            'vendor_id' => $validatedData['vendor_id'],
            'owner_name' => $validatedData['owner_name'],
            'owner_email' => $validatedData['owner_email'],
            'owner_phone' => $validatedData['owner_phone'],
            'total_vehicles' => $validatedData['total_vehicles'],
            'photo' => $validatedData['photo'],
            'owner_address' => $validatedData['owner_address'],
            'vehicle_name' => $this->vehicle_name,
            'updated_by' => 'admin2',
        ]);
        $this->dispatchBrowserEvent('swal:success', [
            'title' => 'Vendor Owner Updated Successfully!',
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
    public function deleteVendorOwner(int $vendorOwner_id)
    {
        $this->vendorOwner_id = $vendorOwner_id;
    }
    public function destroyVendorOwner()
    {
        ETVendorOwner::find($this->vendorOwner_id)->delete();
        $this->dispatchBrowserEvent('swal:success', [
            'title' => 'Vendor Owner Deleted Successfully!',
        ]);
        $this->dispatchBrowserEvent('close-modal');
    }
    public function resetInput()
    {
        $this->owner_name = '';
        $this->owner_email = '';
        $this->owner_phone = '';
        $this->owner_address = '';
        $this->vehicle_name = '';
        $this->total_vehicles = '';
    }
    public function render()
    {
        $vendorOwners = ETVendorOwner::where('owner_name', 'like', '%' . $this->search . '%')->orWhere('created_by', 'like', '%' . $this->search . '%')->orWhere('updated_by', 'like', '%' . $this->search . '%')->orderBy($this->orderBy, $this->orderDirection)->paginate($this->pagination);
        return view('livewire.vendors.vendor-owner', ['vendorOwners' => $vendorOwners]);
    }
}
