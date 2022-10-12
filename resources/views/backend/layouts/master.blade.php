<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        @if (View::hasSection('title'))
        @yield('title')
        @else
        E-ticketing
        @endif
    </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#" />
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app" />
    <meta name="author" content="#" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('cms-asset/images/fac.png') }}" type="image/x-icon" />
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet" />
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('cms-asset/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" />
    <!-- themify-icons line icon -->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('files/assets/icon/themify-icons/themify-icons.css') }}"> -->
    <!-- ico font -->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('files/assets/icon/icofont/css/icofont.css') }}"> -->
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('cms-asset/icon/feather/css/feather.css') }}" />





    <!-- jquery file upload Frame work -->
    <!-- <link href="{{ asset('cms-asset/assets/pages/jquery.filer/css/jquery.filer.css') }}" type="text/css" rel="stylesheet" /> -->
    <link href="{{ asset('cms-asset/assets/pages/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css') }}" type="text/css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="{{ asset('cms-asset/assets/icon/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('cms-asset/assets/icon/simple-line-icons/css/simple-line-icons.css') }}" />
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('cms-asset/assets/icon/icofont/css/icofont.css') }}" />
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('cms-asset/assets/icon/themify-icons/themify-icons.css') }}" />


    <link rel="stylesheet" type="text/css" href="{{ asset('cms-asset/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cms-asset/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cms-asset/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cms-asset/bower_components/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cms-asset/bower_components/bootstrap-multiselect/dist/css/bootstrap-multiselect.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cms-asset/bower_components/multiselect/css/multi-select.css') }}">


    <link rel="stylesheet" type="text/css" href="{{ asset('cms-asset/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('cms-asset/assets/icon/feather/css/feather.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('cms-asset/assets/css/custom.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('cms-asset/assets/css/sweetalert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cms-asset/css/jquery.mCustomScrollbar.css') }}" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" media="all" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Chartlist chart css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('cms-asset/css/chartist.css') }}">
    <!-- Color Picker css -->

    <!-- Tags css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('cms-asset/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="apple-touch-icon" href="{{ asset('cms-asset/images/animate.jpg') }}" type="image/x-icon" />

    <link href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/toasty.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.0/sweetalert2.min.css" integrity="sha512-A374yR9LJTApGsMhH1Mn4e9yh0ngysmlMwt/uKPpudcFwLNDgN3E9S/ZeHcWTbyhb5bVHCtvqWey9DLXB4MmZg==" crossorigin="anonymous" />

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    @livewireStyles
    <script src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>

</head>

<body>

    @include('backend.layouts.pre-loader')
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            @include('backend.layouts.header')
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    @include('backend.layouts.sidebar')
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.layouts.footer')
    @livewireScripts
    @include('backend.layouts.modal')
    @yield('scripts')
</body>

</html>