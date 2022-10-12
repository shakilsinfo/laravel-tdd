<?php

namespace App\Http\Livewire\Vendors;

use Livewire\Component;
use App\Models\ETVendor;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class VendorList extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $pagination = 25;
    public $orderBy = 'name';
    public $orderDirection = 'asc';
    public $name, $email, $contact_no, $total_vehicle, $total_owner, $address, $others_info, $agreement_paper, $vendor_uuid;

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
            'name' => 'required|string',
            'email' => 'required|email',
            'contact_no' => 'required|string',
            'total_vehicle' => 'required',
            'total_owner' => 'required',
            'address' => 'required|string',
            'agreement_paper' => 'file|mimes:png,jpg,pdf',
        ];
    }
    public function updated($fields)
    {
        $this->validateOnly($fields);
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
    public function createVendor($validatedData)
    {
        $filename = $this->uploadFile($validatedData['agreement_paper']);
        $data['name'] = $validatedData['name'];
        $data['email'] = $validatedData['email'];
        $data['contact_no'] = $validatedData['contact_no'];
        $data['agreement_paper'] = $filename;
        $data['total_vehicle'] = $validatedData['total_vehicle'];
        $data['total_owner'] = $validatedData['total_owner'];
        $data['address'] = $validatedData['address'];
        $data['others_info'] = $this->others_info;
        $data['created_by'] = 'admin';
        $data['updated_by'] = 'admin';
        ETVendor::create($data);
    }
    public function saveVendor()
    {
        $validatedData = $this->validate();
        $this->createVendor($validatedData);
        $this->dispatchBrowserEvent('swal:success', [
            'title' => 'Vendor Added Successfully!',
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
    public function editVendor($vendor_id)
    {
        $vendor = ETVendor::find($vendor_id);
        if ($vendor) {
            $this->vendor_uuid = $vendor->id;
            $this->name = $vendor->name;
            $this->email = $vendor->email;
            $this->contact_no = $vendor->contact_no;
            $this->total_vehicle = $vendor->total_vehicle;
            $this->agreement_paper = $vendor->agreement_paper;
            $this->total_owner = $vendor->total_owner;
            $this->address = $vendor->address;
            $this->others_info = $vendor->others_info;
        } else {
            return redirect()->to('/students');
        }
    }
    public function updateVendor()
    {
        $validatedData = $this->validate();
        ETVendor::where('id', $this->vendor_uuid)->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'contact_no' => $validatedData['contact_no'],
            'total_vehicle' => $validatedData['total_vehicle'],
            'total_owner' => $validatedData['total_owner'],
            'address' => $validatedData['address'],
            'agreement_paper' => $this->agreement_paper,
            'others_info' => $this->others_info,
            'updated_by' => 'admin2',
        ]);
        $this->dispatchBrowserEvent('swal:success', [
            'title' => 'Vendor Updated Successfully!',
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
    public function deleteVendor(int $vendor_id)
    {
        $this->vendor_uuid = $vendor_id;
    }
    public function destroyVendor()
    {
        ETVendor::find($this->vendor_uuid)->delete();
        $this->dispatchBrowserEvent('swal:success', [
            'title' => 'Vendor Deleted Successfully!',
        ]);
        $this->dispatchBrowserEvent('close-modal');
    }
    public function closeModal()
    {
        $this->vendor_uuid = '';
        $this->name = '';
        $this->email = '';
        $this->contact_no = '';
        $this->total_vehicle = '';
        $this->total_owner = '';
        $this->address = '';
    }
    public function resetInput()
    {
        $this->name = '';
        $this->email = '';
        $this->contact_no = '';
        $this->total_vehicle = '';
        $this->total_owner = '';
        $this->address = '';
    }
    public function render()
    {
        $vendors = ETVendor::where('name', 'like', '%' . $this->search . '%')->orWhere('contact_no', 'like', '%' . $this->search . '%')->orderBy($this->orderBy, $this->orderDirection)->paginate($this->pagination);
        return view('livewire.vendors.vendor-list', ['vendors' => $vendors]);
    }
}
