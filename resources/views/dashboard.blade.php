@extends('backend.layouts.master')
@section('content')
    <div class="page-body">
        <div class="row">
            <!-- task, page, download counter  start -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-c-yellow update-card">
                    <div class="card-block">
                        <div class="row align-items-end">
                            <div class="col-8">
                                <h4 class="text-white">$30200</h4>
                                <h6 class="text-white m-b-0">All Earnings</h6>
                            </div>
                            <div class="col-4 text-right">
                                <canvas id="update-chart-1" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update
                            : 2:15 am</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- social download  end -->
@endsection
@section('scripts')
@endsection
