<div>
    <div class="row">
        <div class="col-sm-12">
            <!-- Material tab card start -->
            <div class="card">
                <div class="card-header">
                    {{-- <h5>Settings</h5> --}}
                </div>
                <div class="card-block">
                    <!-- Row start -->
                    <div class="row m-b-30">
                        <div class="col-md-12 col-lg-12">
                            <div class="sub-title">Settings</div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs md-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab"
                                        href="#fare" role="tab">Fare Settings</a>
                                    <div class="slide"></div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab"
                                        href="#general" role="tab">General Settings</a>
                                    <div class="slide"></div>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content card-block">
                                @include('livewire.settings.utilities.fare')
                                @include('livewire.settings.utilities.general')
                            </div>
                        </div>
                    </div>
                    <!-- Row end -->
                </div>
            </div>
            <!-- Material tab card end -->
        </div>
    </div>
</div>
