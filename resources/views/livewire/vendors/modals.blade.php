<!--Add Vendor Modal -->
<div wire:ignore.self class="modal fade" id="vendorModal" tabindex="-1" role="dialog" aria-labelledby="vendorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="vendorModalLabel">Create Vendor</h5>
          <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form  wire:submit.prevent="saveVendor">
            <div class="modal-body row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Name<span class="text-danger">*</span></label>
                        <input type="text" wire:model="name" placeholder="Enter Vendor Name" required class="form-control @error('name') is-invalid @enderror">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Email <span class="text-danger">*</span></label>
                        <input type="text" wire:model="email" placeholder="Enter Email" required class="form-control @error('email') is-invalid @enderror">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Phone <span class="text-danger">*</span></label>
                        <input type="text" wire:model="contact_no" placeholder="Enter Phone" required class="form-control @error('contact_no') is-invalid @enderror">
                        @error('contact_no') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Agreement Paper <span class="text-danger">*</span></label>
                        <input type="file" wire:model="agreement_paper" placeholder="Enter Phone" required class="form-control @error('agreement_paper') is-invalid @enderror">
                        @error('agreement_paper') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Total Vehicle<span class="text-danger">*</span></label>
                        <input type="number" wire:model="total_vehicle" placeholder="Enter Number of Vehicles" required class="form-control @error('total_vehicle') is-invalid @enderror">
                        @error('total_vehicle') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Total Owner<span class="text-danger">*</span></label>
                        <input type="number" wire:model="total_owner" placeholder="Enter Number of Owners" required class="form-control @error('total_owner') is-invalid @enderror">
                        @error('total_owner') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-form-label">Address<span class="text-danger">*</span></label>
                        <textarea class="form-control @error('address') is-invalid @enderror" width='100%' wire:model="address" rows="3" placeholder="Enter Address" required></textarea>
                        @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-form-label">Otherd Information</label>
                        <textarea class="form-control" width='100%' wire:model="others_info" placeholder="Enter Others Info (optional)" rows="3"></textarea>
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

<!--update Vendor Modal -->
<div wire:ignore.self class="modal fade" id="updateVendorModal" tabindex="-1" role="dialog" aria-labelledby="updateVendorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateVendorModalLabel">Edit Vendor</h5>
          <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form  wire:submit.prevent="updateVendor">
            <div class="modal-body row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Name<span class="text-danger">*</span></label>
                        <input type="text" wire:model="name" placeholder="Enter Vendor Name" required class="form-control @error('name') is-invalid @enderror">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Email <span class="text-danger">*</span></label>
                        <input type="text" wire:model="email" placeholder="Enter Email" required class="form-control @error('email') is-invalid @enderror">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Phone <span class="text-danger">*</span></label>
                        <input type="text" wire:model="contact_no" placeholder="Enter Phone" required class="form-control @error('contact_no') is-invalid @enderror">
                        @error('contact_no') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Agreement Paper <span class="text-danger">*</span></label>
                        <input type="file" wire:model="agreement_paper" placeholder="Enter Phone" required class="form-control @error('agreement_paper') is-invalid @enderror">
                        @error('agreement_paper') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Total Vehicle<span class="text-danger">*</span></label>
                        <input type="number" wire:model="total_vehicle" placeholder="Enter Number of Vehicles" required class="form-control @error('total_vehicle') is-invalid @enderror">
                        @error('total_vehicle') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Total Owner<span class="text-danger">*</span></label>
                        <input type="number" wire:model="total_owner" placeholder="Enter Number of Owners" required class="form-control @error('total_owner') is-invalid @enderror">
                        @error('total_owner') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-form-label">Address<span class="text-danger">*</span></label>
                        <textarea class="form-control @error('address') is-invalid @enderror" width='100%' wire:model="address" rows="3" placeholder="Enter Address" required></textarea>
                        @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-form-label">Otherd Information</label>
                        <textarea class="form-control" width='100%' wire:model="others_info" placeholder="Enter Others Info (optional)" rows="3"></textarea>
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

<!--Delete Vendor Modal -->
<div wire:ignore.self class="modal fade" id="deleteVendorModal" tabindex="-1" role="dialog" aria-labelledby="deleteVendorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="deleteVendorModalLabel">Delete Vendor</h5>
            <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form wire:submit.prevent="destroyVendor">
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