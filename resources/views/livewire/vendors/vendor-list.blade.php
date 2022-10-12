<div>
    @include('livewire.vendors.modals')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="d-flex justify-content-between">
                        Vendor List
                        <button type="button" class="btn btn-primary float-end" data-toggle="modal" data-target="#vendorModal">
                            Add New Vendor
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
                                <th style="cursor:pointer" wire:click="setOrderBy('name')">Name 
                                    
                                    @if($this->orderBy == 'name')
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
                                <th>Agrrement Paper</th>
                                <th>Total Vehicle</th>
                                <th>Total Owner</th>
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
                            @forelse($vendors as $index=> $vendor)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>
                                        <b>{{ $vendor->name }}</b>
                                    </td>
                                    <td>{{ $vendor->contact_no }}</td>
                                    <td>
                                        <span class="mytooltip tooltip-effect-1">
                                            <span class="tooltip-item">
                                                <a href="{{ asset('storage/vendors/'.$vendor->agreement_paper) }}" target="blank">
                                                    <img src="{{ asset('storage/vendors/'.$vendor->agreement_paper) }}" alt="Agrements" width="50px">
                                                </a>
                                            </span>
                                            <span class="tooltip-content clearfix">
                                                <img src="{{ asset('storage/vendors/'.$vendor->agreement_paper) }}" alt="Agrement Paper" width="100%">
                                            </span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary f-12">{{ $vendor->total_vehicle }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-dark f-12">{{ $vendor->total_owner }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ $vendor->created_by }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-warning">{{ $vendor->updated_by }}</span>
                                    </td>
                                    <td>
                                        <button type="button" wire:click="editVendor({{$vendor->id}})" class="label label-inverse-success" data-toggle="modal" data-target="#updateVendorModal"><i class="fa fa-pencil-square-o"></i> Edit</button>
                                        <button type="button" wire:click="deleteVendor({{$vendor->id}})" class="label label-inverse-danger" data-toggle="modal" data-target="#deleteVendorModal"><i class="icofont icofont-trash"></i> Delete</button>
                                    </td>
                                </tr>
                                @empty
                                <tr class="text-center">
                                    <td colspan="9">No Records Found!</td>
                                </tr>
                                @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        {!! $vendors->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
