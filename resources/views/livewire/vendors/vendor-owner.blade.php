<div>
    @include('livewire.vendors.modals-owner')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="d-flex justify-content-between">
                        Vendor Owner List
                        <button type="button" wire:click="loadVendor" class="btn btn-primary float-end" data-toggle="modal" data-target="#vendorOwnerModal">
                            Add New Vendor Owner
                        </button>
                    </h4>
                </div>
                <div class="card-body table-responsive">
                    <div class="d-flex justify-content-between mb-3">
                        <label for="">
                            Show
                            <select wire:model="pagination">
                                <option value="25" {{ $this->pagination == 25 ? 'selected' : ''}} wire:click="setPagination(25)">25</option>
                                <option value="50" {{ $this->pagination == 50 ? 'selected' : ''}}  wire:click="setPagination(50)">50</option>
                                <option value="100" {{ $this->pagination == 100 ? 'selected' : ''}} wire:click="setPagination(100)">100</option>
                                <option value="200" {{ $this->pagination == 200 ? 'selected' : ''}} wire:click="setPagination(200)">200</option>
                            </select>
                            entries
                        </label>
                        <input type="search" wire:model="search" class="form-control" placeholder="Search" style="width:20%;">
                    </div>
                    <table class="table table-bordered table-hover compact nowrap text-center">
                        <thead>
                            <tr>
                                <th>S/L</th>
                                <th style="cursor:pointer" wire:click="setOrderBy('owner_name')">Name 
                                    @if($this->orderBy == 'owner_name')
                                    <span class="float-end">
                                        <i class="fa {{ $this->orderDirection == 'asc' ? 'fa-sort-up' : 'fa-sort-down' }}"></i>
                                    </span>
                                    @else
                                    <span class="float-end"  style="color:#00000047">
                                        <i class="fa fa-sort-up"></i>
                                    </span>
                                    @endif
                                </th>
                                <th>Contact</th>
                                <th>Image</th>
                                <th>Vendor</th>
                                <th>Total Vehicles</th>
                                <th>Vehicle Name</th>
                                <th style="cursor:pointer" wire:click="setOrderBy('created_by')">Created By
                                    
                                    @if($this->orderBy == 'created_by')
                                    <span class="float-end">
                                        <i class="fa {{ $this->orderDirection == 'asc' ? 'fa-sort-up' : 'fa-sort-down' }}"></i>
                                    </span>
                                    @else
                                    <span class="float-end"  style="color:#00000047">
                                        <i class="fa fa-sort-up"></i>
                                    </span>
                                    @endif
                                    
                                </th>
                                <th style="cursor:pointer" wire:click="setOrderBy('updated_by')">Updated By
                                    
                                    @if($this->orderBy == 'updated_by')
                                    <span class="float-end">
                                        <i class="fa {{ $this->orderDirection == 'asc' ? 'fa-sort-up' : 'fa-sort-down' }}"></i>
                                    </span>
                                    @else
                                    <span class="float-end"  style="color:#00000047">
                                        <i class="fa fa-sort-up"></i>
                                    </span>
                                    @endif
                                    
                                </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="vendorTbody">
                            @forelse($vendorOwners as $index=> $vendorOwner)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>
                                        <b>{{ $vendorOwner->owner_name }}</b>
                                    </td>
                                    <td>{{ $vendorOwner->owner_phone }}</td>
                                    <td>
                                        <span class="mytooltip tooltip-effect-1">
                                            <span class="tooltip-item">
                                                <a href="{{ asset('storage/vendors/'.$vendorOwner->photo) }}" target="blank">
                                                    <img src="{{ asset('storage/vendors/'.$vendorOwner->photo) }}" alt="" width="50px">
                                                </a>
                                            </span>
                                            <span class="tooltip-content clearfix">
                                                <img src="{{ asset('storage/vendors/'.$vendorOwner->photo) }}" alt="" width="100%">
                                            </span>
                                        </span>
                                    </td>
                                    <td>
                                        <b>{{ $vendorOwner->vendor->name }}</b>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary f-12">{{ $vendorOwner->total_vehicles }}</span>
                                    </td>
                                    <td>{{ $vendorOwner->vehicle_name }}</td>
                                    <td>
                                        <span class="badge bg-info">{{ $vendorOwner->created_by }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-warning">{{ $vendorOwner->updated_by }}</span>
                                    </td>
                                    <td>
                                        <button type="button" wire:click="editVendorOwner({{$vendorOwner->id}})" class="label label-inverse-success" data-toggle="modal" data-target="#updateVendorOwnerModal"><i class="fa fa-pencil-square-o"></i> Edit</button>
                                        <button type="button" wire:click="deleteVendorOwner({{$vendorOwner->id}})" class="label label-inverse-danger" data-toggle="modal" data-target="#deleteVendorOwnerModal"><i class="icofont icofont-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="10">No Records Found!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        {!! $vendorOwners->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
