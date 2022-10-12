@extends('backend.layouts.master')
@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Vehicles</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item" style="float: left;">
                        <a href="{{ url('/') }}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item" style="float: left;"><a href="#">Vehicles</a>
                    </li>
                    <li class="breadcrumb-item" style="float: left;"><a href="#">Vehicles</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    @livewire('vehicles.vehicles.vehicles')
</div>
@endsection
@section('scripts')
<script>
    window.addEventListener('close-modal', event => {
        $("#addRouteModal").modal('hide');
        $("#updateRouteModal").modal('hide');
        $("#deleteRouteModal").modal('hide');
    });
    window.addEventListener('swal:success', event => {
        swal({
            title:event.detail.title,
            text:event.detail.text,
            icon:"success",
            timer:2000,
            toast: true,
            position:'top',
        });
    });
</script>
@endsection