<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)"
           data-toggle="collapse" data-target=".navbar-collapse">
            <i class="ti-menu"></i>
        </a>
        <div class="top-left-part">
            <a class="logo" href="{{ url('/home') }}">
                <b>
                    <img height="50" width="60" src="{{ asset('images/picture2.png') }}" alt="home"/>
                </b>
                <span class="hidden-xs">{{ config('app.name') }}</span>
            </a>
        </div>
        <ul class="nav navbar-top-links navbar-left hidden-xs">
            <li>
                <a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light">
                    <i class="icon-arrow-left-circle ti-menu"></i>
                </a>
            </li>
        </ul>
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li class="dropdown">
                <a class="dropdown-toggle " data-toggle="dropdown" href="#">
                    <b class="hidden-xs">{{ Auth::user()->name }}</b>
                </a>
                <ul class="dropdown-menu dropdown-user animated flipInY">
                    <li>
                        <a href="{{ url('home/user-profile') }}">
                            <i class="ti-user p-r-10"></i> Hồ sơ cá nhân
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" onclick="logout(event)">
                            <i class="fa fa-power-off p-r-10"></i> Đăng xuất
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>