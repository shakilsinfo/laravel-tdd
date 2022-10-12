<div>
    @include('livewire.vehicles.routes.modals')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="d-flex justify-content-between">
                        Route List:
                        <button type="button" wire:click="loadVendor" class="btn btn-primary float-end" data-toggle="modal" data-target="#addRouteModal">
                            Add New Route
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
                                <th>Route Name</th>
                                <th  style="cursor:pointer" wire:click="setOrderBy('vendor_id')">Vendor name
                                    @if($this->orderBy == 'vendor_id')
                                    <span class="float-end">
                                        <i class="fa {{ $this->orderDirection == 'asc' ? 'fa-sort-up' : 'fa-sort-down' }}"></i>
                                    </span>
                                    @else
                                    <span class="float-end"  style="color:#00000047">
                                        <i class="fa fa-sort-up"></i>
                                    </span>
                                    @endif
                                </th>
                                <th>Total Distance (KM)</th>
                                <th>Total Vehicles</th>
                                <th  style="cursor:pointer" wire:click="setOrderBy('route_location')">Location
                                    @if($this->orderBy == 'route_location')
                                    <span class="float-end">
                                        <i class="fa {{ $this->orderDirection == 'asc' ? 'fa-sort-up' : 'fa-sort-down' }}"></i>
                                    </span>
                                    @else
                                    <span class="float-end"  style="color:#00000047">
                                        <i class="fa fa-sort-up"></i>
                                    </span>
                                    @endif
                                </th>
                                <th  style="cursor:pointer" wire:click="setOrderBy('is_permit')">Route Permit
                                    @if($this->orderBy == 'is_permit')
                                    <span class="float-end">
                                        <i class="fa {{ $this->orderDirection == 'asc' ? 'fa-sort-up' : 'fa-sort-down' }}"></i>
                                    </span>
                                    @else
                                    <span class="float-end"  style="color:#00000047">
                                        <i class="fa fa-sort-up"></i>
                                    </span>
                                    @endif
                                </th>
                                <th  style="cursor:pointer" wire:click="setOrderBy('vehicle_type')">Vehicle Type
                                    @if($this->orderBy == 'vehicle_type')
                                    <span class="float-end">
                                        <i class="fa {{ $this->orderDirection == 'asc' ? 'fa-sort-up' : 'fa-sort-down' }}"></i>
                                    </span>
                                    @else
                                    <span class="float-end"  style="color:#00000047">
                                        <i class="fa fa-sort-up"></i>
                                    </span>
                                    @endif
                                </th>
                                <th  style="cursor:pointer" wire:click="setOrderBy('created_by')">Created By
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
                                <th  style="cursor:pointer" wire:click="setOrderBy('updated_by')">Updated By
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
                                <th>Last Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="vendorTbody">
                            @forelse($routes as $index=> $route)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $route->route_name }}</td>
                                <td>
                                    <b>{{ $route->vendor->name }}</b>
                                </td>
                                <td>{{ $route->total_destination_km }}</td>
                                <td>
                                    <span class="badge bg-dark f-12">{{ $route->total_vehicles }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-info f-12">{{ $route->route_location }}</span>
                                </td>
                                <td>
                                    @if( $route->is_permit == 1 )
                                    <span class="badge bg-success f-12">Yes</span>
                                    @else
                                    <span class="badge bg-danger f-12">No</span>
                                    @endif
                                </td>
                                <td>
                                    @if( $route->vehicle_type == 1 )
                                    <span class="badge bg-primary f-12">Sitting</span>
                                    @else
                                    <span class="badge bg-warning f-12">Local</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-info">{{ $route->created_by }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-warning">{{ $route->updated_by }}</span>
                                </td>
                                <th>{{ $route->updated_at->diffforhumans() }}</th>
                                <td>
                                    <button type="button" wire:click="editRoute({{$route->id}})" class="label label-inverse-success" data-toggle="modal" data-target="#updateRouteModal"><i class="fa fa-pencil-square-o"></i> Edit</button>
                                        <button type="button" wire:click="deleteRoute({{$route->id}})" class="label label-inverse-danger" data-toggle="modal" data-target="#deleteRouteModal"><i class="icofont icofont-trash"></i> Delete</button>
                                </td>
                            </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="12">No Records Found!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        {!! $routes->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
