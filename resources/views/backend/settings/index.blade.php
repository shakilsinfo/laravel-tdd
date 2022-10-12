@extends('backend.layouts.master')
@section('content')
<div class="page-body">
    @livewire('settings.setting')
</div>
@endsection
@section('scripts')
<script>
    window.addEventListener('close-modal', event => {
        $("#fareAddOrUpdate").modal('hide');
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