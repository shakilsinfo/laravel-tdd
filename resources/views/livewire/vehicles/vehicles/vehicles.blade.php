<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="d-flex justify-content-between">
                        Vehicle List:
                        <button type="button" wire:click="loadVendor" class="btn btn-primary float-end" data-toggle="modal" data-target="#addRouteModal">
                            Add New Vehicle
                        </button>
                    </h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover table-bordered compact nowrap text-center">
                        <thead>
                            <tr>
                                <th>S/L</th>
                                <th>Vendor Name</th>
                                <th>Owner Name</th>
                                <th>Route</th>
                                <th>Bus No</th>
                                <th>Fitness</th>
                                <th>Tax Token</th>
                                <th>Road Permit</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th>Last Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="vendorTbody">
                            @forelse($vehicles as $index=> $vehicle)
                            @empty
                                <tr class="text-center">
                                    <td colspan="12">No Records Found!</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
