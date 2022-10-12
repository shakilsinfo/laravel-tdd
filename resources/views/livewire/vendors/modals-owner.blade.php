<!--Add Vendor Owner Modal -->
<div wire:ignore.self class="modal fade" id="vendorOwnerModal" tabindex="-1" role="dialog" aria-labelledby="vendorOwnerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="vendorOwnerModalLabel">Create Vendor Owner</h5>
          <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form  wire:submit.prevent="saveVendorOwner">
            <div class="modal-body row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-form-label">Select Vendor<span class="text-danger">*</span></label>
                        <select class="form-control @error('vendor_id') is-invalid @enderror" wire:model="vendor_id" placeholder="Please Select Vendor">
                            <option value="">--Please Select Vendor--</option>
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
                        <label class="col-form-label">Name<span class="text-danger">*</span></label>
                        <input type="text" wire:model="owner_name" placeholder="Enter Vendor Name" required class="form-control @error('owner_name') is-invalid @enderror">
                        @error('owner_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Email <span class="text-danger">*</span></label>
                        <input type="text" wire:model="owner_email" placeholder="Enter Email" required class="form-control @error('owner_email') is-invalid @enderror">
                        @error('owner_email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Phone <span class="text-danger">*</span></label>
                        <input type="text" wire:model="owner_phone" placeholder="Enter Phone" required class="form-control @error('owner_phone') is-invalid @enderror">
                        @error('owner_phone') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Photo <span class="text-danger">*</span></label>
                        <input type="file" wire:model="photo" placeholder="Enter Phone" required class="form-control @error('photo') is-invalid @enderror">
                        @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Vehicle Name<span class="text-danger">*</span></label>
                        <input type="text" wire:model="vehicle_name" placeholder="Enter Number of Owners" required class="form-control @error('vehicle_name') is-invalid @enderror">
                        @error('vehicle_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Total Vehicle<span class="text-danger">*</span></label>
                        <input type="number" wire:model="total_vehicles" placeholder="Enter Number of Vehicles" required class="form-control @error('total_vehicles') is-invalid @enderror">
                        @error('total_vehicles') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-form-label">Address<span class="text-danger">*</span></label>
                        <textarea class="form-control @error('owner_address') is-invalid @enderror" width='100%' wire:model="owner_address" rows="3" placeholder="Enter Address" required></textarea>
                        @error('owner_address') <span class="text-danger">{{ $message }}</span> @enderror
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

<!--Update Vendor Owner Modal -->
<div wire:ignore.self class="modal fade" id="updateVendorOwnerModal" tabindex="-1" role="dialog" aria-labelledby="updateVendorOwnerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateVendorOwnerModalLabel">Edit Vendor Owner</h5>
          <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form  wire:submit.prevent="updateVendorOwner">
            <div class="modal-body row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-form-label">Select Vendor<span class="text-danger">*</span></label>
                        <select class="form-control @error('vendor_id') is-invalid @enderror" wire:model="vendor_id" placeholder="Please Select Vendor">
                            <option value="">--Please Select Vendor--</option>
                            @forelse ($vendors as $vendor)
                            <option value="{{ $vendor->id }}" {{ $vendor->id ==  $vendor_id ? 'selected' : ''}}>{{ $vendor->name }}</option>
                            @empty
                            <option value="">No Vendors Found!</option>    
                            @endforelse
                        </select>
                        @error('vendor_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Name<span class="text-danger">*</span></label>
                        <input type="text" wire:model="owner_name" placeholder="Enter Vendor Name" required class="form-control @error('owner_name') is-invalid @enderror">
                        @error('owner_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Email <span class="text-danger">*</span></label>
                        <input type="text" wire:model="owner_email" placeholder="Enter Email" required class="form-control @error('owner_email') is-invalid @enderror">
                        @error('owner_email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Phone <span class="text-danger">*</span></label>
                        <input type="text" wire:model="owner_phone" placeholder="Enter Phone" required class="form-control @error('owner_phone') is-invalid @enderror">
                        @error('owner_phone') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Photo <span class="text-danger">*</span></label>
                        <input type="file" wire:model="photo" placeholder="Enter Phone" required class="form-control @error('photo') is-invalid @enderror">
                        @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Vehicle Name<span class="text-danger">*</span></label>
                        <input type="text" wire:model="vehicle_name" placeholder="Enter Number of Owners" required class="form-control @error('vehicle_name') is-invalid @enderror">
                        @error('vehicle_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Total Vehicle<span class="text-danger">*</span></label>
                        <input type="number" wire:model="total_vehicles" placeholder="Enter Number of Vehicles" required class="form-control @error('total_vehicles') is-invalid @enderror">
                        @error('total_vehicles') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-form-label">Address<span class="text-danger">*</span></label>
                        <textarea class="form-control @error('owner_address') is-invalid @enderror" width='100%' wire:model="owner_address" rows="3" placeholder="Enter Address" required></textarea>
                        @error('owner_address') <span class="text-danger">{{ $message }}</span> @enderror
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

<!--Delete Vendor Owner Modal -->
<div wire:ignore.self class="modal fade" id="deleteVendorOwnerModal" tabindex="-1" role="dialog" aria-labelledby="deleteVendorOwnerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="deleteVendorOwnerModalLabel">Delete Vendor Owner</h5>
            <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form wire:submit.prevent="destroyVendorOwner">
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