<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="{{ url()->current() == url('home') ? 'active' : '' }}">
                <a href="{{ route('home') }}">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext side_menubar">Dashboard</span>
                </a>
            </li>
            <li class="pcoded-hasmenu
                {{  url()->current() == url('vendors') ? 'pcoded-trigger' : ''  }}
                {{  url()->current() == url('vendor-owners') ? 'pcoded-trigger' : ''  }}">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="fa fa-users"></i></span>
                    <span class="pcoded-mtext">Vendors</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="{{  url()->current() == url('vendors') ? 'active' : ''  }}">
                        <a href="{{ route('vendors.index') }}">
                            <span class="pcoded-mtext">Vendor List</span>
                        </a>
                    </li>
                    <li class=" {{  url()->current() == url('vendor-owners') ? 'active' : ''  }} ">
                        <a href="{{ route('vendor-owners.index') }}">
                            <span class="pcoded-mtext">Vendor Owners</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu 
            {{ url()->current() == url('vehicles/routes') ? 'pcoded-trigger' : '' }}
            {{ url()->current() == url('vehicles/vehicles') ? 'pcoded-trigger' : '' }}">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="fas fa-bus-alt"></i></span>
                    <span class="pcoded-mtext side_menubar">Vehicles</span>
                    
                </a>
                <ul class="pcoded-submenu">
                    <li class="{{ url()->current() == url('vehicles/vehicles') ? 'active' : '' }}">
                        <a href="{{route('vehicles.index')}}">
                            <span class="pcoded-mtext">Vehicles</span>
                        </a>
                    </li>
                </ul>
                <ul class="pcoded-submenu">
                    <li class="{{ url()->current() == url('vehicles/routes') ? 'active' : '' }}">
                        <a href="{{route('routes.index')}}">
                            <span class="pcoded-mtext">Routes</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{ url()->current() == url('settings') ? 'active' : '' }}">
                <a href="{{ route('settings.index') }}">
                    <span class="pcoded-micon"><i class="fa fa-gear"></i></span>
                    <span class="pcoded-mtext side_menubar">Settings</span>
                </a>
            </li>
        </ul>
    </div>
</nav>