<!--Add Route Modal -->
<div wire:ignore.self class="modal fade" id="addRouteModal" tabindex="-1" role="dialog" aria-labelledby="addRouteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addRouteModalLabel">Create New Route</h5>
          <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form  wire:submit.prevent="saveRoute">
            <div class="modal-body row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-form-label">Select Vendor<span class="text-danger">*</span></label>
                        <select class="form-control @error('vendor_id') is-invalid @enderror" wire:model="vendor_id" placeholder="Please Select Vendor">
                            <option value="" selected>--Please Select Vendor--</option>
                            @forelse ($vendors as $vendor)
                            <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                            @empty
                            <option value="">No Vendors Found!</option>    
                            @endforelse
                        </select>
                        @error('vendor_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Route Name<span class="text-danger">*</span></label>
                        <input type="text" wire:model="route_name" placeholder="Enter Route Name (A to Z)" required class="form-control @error('route_name') is-invalid @enderror">
                        @error('route_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Route Location <span class="text-danger">*</span></label>
                        <input type="text" wire:model="route_location" placeholder="Enter Route Location. Ex-Dhaka" required class="form-control @error('route_location') is-invalid @enderror">
                        @error('route_location') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Total Distance<span class="text-danger">*</span></label>
                        <input type="text" wire:model="total_destination_km" placeholder="Enter Total Distance" required class="form-control @error('total_destination_km') is-invalid @enderror">
                        @error('total_destination_km') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Total Vehicles<span class="text-danger">*</span></label>
                        <input type="number" wire:model="total_vehicles" placeholder="Enter Number of Vehicles" required class="form-control @error('total_vehicles') is-invalid @enderror">
                        @error('total_vehicles') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Select Route Permit<span class="text-danger">*</span></label>
                        <select class="form-control @error('is_permit') is-invalid @enderror" wire:model="is_permit">
                            <option value="">--Please Select Route Permit--</option>
                            <option value="1" {{ $this->is_permit == 1 ? 'selected' : ''}} >Yes</option>
                            <option value="0" {{ $this->is_permit == 0 ? 'selected' : ''}} >No</option>
                        </select>
                        @error('is_permit') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Select Vehicle Type<span class="text-danger">*</span></label>
                        <select class="form-control @error('vehicle_type') is-invalid @enderror" wire:model="vehicle_type">
                            <option value="">--Please Select Vehicle Type--</option>
                            <option value="1" {{ $this->vehicle_type == 1 ? 'selected' : ''}} >Sitting</option>
                            <option value="0" {{ $this->vehicle_type == 0 ? 'selected' : ''}} >Local</option>
                        </select>
                        @error('vehicle_type') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeModal" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create</button>
              </div>
        </form>
      </div>
    </div>
</div>

<!--Update Route Modal -->
<div wire:ignore.self class="modal fade" id="updateRouteModal" tabindex="-1" role="dialog" aria-labelledby="updateRouteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateRouteModalLabel">Edit Route</h5>
          <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form  wire:submit.prevent="updateRoute">
            <div class="modal-body row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-form-label">Select Vendor<span class="text-danger">*</span></label>
                        <select class="form-control @error('vendor_id') is-invalid @enderror" wire:model="vendor_id" placeholder="Please Select Vendor">
                            <option value="" selected>--Please Select Vendor--</option>
                            @forelse ($vendors as $vendor)
                            <option value="{{ $vendor->id }}"  {{ $vendor->id ==  $vendor_id ? 'selected' : ''}}>{{ $vendor->name }}</option>
                            @empty
                            <option value="">No Vendors Found!</option>    
                            @endforelse
                        </select>
                        @error('vendor_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Route Name<span class="text-danger">*</span></label>
                        <input type="text" wire:model="route_name" placeholder="Enter Route Name (A to Z)" required class="form-control @error('route_name') is-invalid @enderror">
                        @error('route_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Route Location <span class="text-danger">*</span></label>
                        <input type="text" wire:model="route_location" placeholder="Enter Route Location. Ex-Dhaka" required class="form-control @error('route_location') is-invalid @enderror">
                        @error('route_location') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Total Distance<span class="text-danger">*</span></label>
                        <input type="text" wire:model="total_destination_km" placeholder="Enter Total Distance" required class="form-control @error('total_destination_km') is-invalid @enderror">
                        @error('total_destination_km') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Total Vehicles<span class="text-danger">*</span></label>
                        <input type="number" wire:model="total_vehicles" placeholder="Enter Number of Vehicles" required class="form-control @error('total_vehicles') is-invalid @enderror">
                        @error('total_vehicles') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Select Route Permit<span class="text-danger">*</span></label>
                        <select class="form-control @error('is_permit') is-invalid @enderror" wire:model="is_permit">
                            <option value="">--Please Select Route Permit--</option>
                            <option value="1" {{ $this->is_permit == 1 ? 'selected' : ''}} >Yes</option>
                            <option value="0" {{ $this->is_permit == 0 ? 'selected' : ''}} >No</option>
                        </select>
                        @error('is_permit') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Select Vehicle Type<span class="text-danger">*</span></label>
                        <select class="form-control @error('vehicle_type') is-invalid @enderror" wire:model="vehicle_type">
                            <option value="">--Please Select Vehicle Type--</option>
                            <option value="1" {{ $this->vehicle_type == 1 ? 'selected' : ''}} >Sitting</option>
                            <option value="0" {{ $this->vehicle_type == 0 ? 'selected' : ''}} >Local</option>
                        </select>
                        @error('vehicle_type') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeModal" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
        </form>
      </div>
    </div>
</div>

<!--Delete Route Modal -->
<div wire:ignore.self class="modal fade" id="deleteRouteModal" tabindex="-1" role="dialog" aria-labelledby="deleteRouteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="deleteRouteModalLabel">Delete Route</h5>
            <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form wire:submit.prevent="destroyRoute">
                <div class="modal-body">
                    <h4>Are you sure you want to delete this data?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="closeModal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes! Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>