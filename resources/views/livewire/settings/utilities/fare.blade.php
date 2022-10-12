<div wire:ignore.self class="tab-pane active" id="fare" role="tabpanel">
    <div class="table-responsive d-flex justify-content-center">
        <div class="container row">
            <div class="col-md-12 p-0 mb-2">
                <div class="text-right">
                    <button type="button" wire:click="editFare({{ isset($ticketFare['id']) ? $ticketFare['id'] : '0' }})" class="btn btn-sm btn-success" data-toggle="modal" data-target="#fareAddOrUpdate">Create or Update</button>
                </div>
            </div>
            <div class="col-md-12 p-0 mb-2">
                <table class="table table-bordered compact table-hover nowrap">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Fare (TK)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Gas Fare / KM</th>
                            <td>{{ isset($ticketFare['gas_fare_per_km']) ? $ticketFare['gas_fare_per_km'] : '0' }}</td>
                        </tr>
                        <tr>
                            <th>Diesel Fare / KM</th>
                            <td>{{ isset($ticketFare['diesel_fare_per_km']) ? $ticketFare['diesel_fare_per_km'] : '0' }}</td>
                        </tr>
                        <tr>
                            <th>Minimum Fare</th>
                            <td>{{ isset($ticketFare['min_fare']) ? $ticketFare['min_fare'] : '0' }}</td>
                        </tr>
                        <tr>
                            <th>Special Fare</th>
                            <td>{{ isset($ticketFare['special_fare']) ? $ticketFare['special_fare'] : '0' }}</td>
                        </tr>
                        <tr>
                            <th>Last Updated By</th>
                            <td>{{ isset($ticketFare['updated_by']) ? $ticketFare['updated_by'] : '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--Add Update Modal -->
<div wire:ignore.self class="modal fade" id="fareAddOrUpdate" tabindex="-1" role="dialog" aria-labelledby="fareAddOrUpdateLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="fareAddOrUpdateLabel">Create or Update</h5>
          <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form  wire:submit.prevent="updateOrCreateTicketFare">
            <div class="modal-body">
                <div class="md-3">
                    <div class="form-group">
                        <label class="col-form-label">Gas Fare / KM <span class="text-danger">*</span></label>
                        <input type="text" wire:model="gas_fare_per_km" required class="form-control">
                        @error('gas_fare_per_km') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="md-3">
                    <div class="form-group">
                        <label class="col-form-label">Diesel Fare / KM <span class="text-danger">*</span></label>
                        <input type="text" wire:model="diesel_fare_per_km" required class="form-control">
                        @error('diesel_fare_per_km') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="md-3">
                    <div class="form-group">
                        <label class="col-form-label">Minimum Fare <span class="text-danger">*</span></label>
                        <input type="text" wire:model="min_fare" required class="form-control">
                        @error('min_fare') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="md-3">
                    <div class="form-group">
                        <label class="col-form-label">Special Fare <span class="text-danger">*</span></label>
                        <input type="text" wire:model="special_fare" required class="form-control">
                        @error('special_fare') <span class="text-danger">{{ $message }}</span> @enderror
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