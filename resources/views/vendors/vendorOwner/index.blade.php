@extends('backend.layouts.master')
@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Vendor Owner</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item" style="float: left;">
                        <a href="{{ url('/') }}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item" style="float: left;"><a href="#">Vendor Owner</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    @livewire('vendors.vendor-owner')
</div>
@endsection
@section('scripts')
<script>
    window.addEventListener('close-modal', event => {
        $("#vendorOwnerModal").modal('hide');
        $("#updateVendorOwnerModal").modal('hide');
        $("#deleteVendorOwnerModal").modal('hide');
    });
    window.addEventListener('swal:success', event => {
        swal({
            title:event.detail.title,
            text:event.detail.text,
            icon:"success",
            timer:3000,
            toast: true,
            position:'top',
        });
    });
</script>
@endsection