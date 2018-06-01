{{--@php--}}
{{--$controller = strtolower(request()->route()->getAction()['controller']);--}}
{{--$flightMenuSelected = strpos($controller, 'topflights') > -1 || strpos($controller, 'airports') > -1 || strpos($controller, 'airlines') > -1 || strpos($controller, 'air-bookings') > -1;--}}
{{--@endphp--}}

<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                <div class="input-group custom-search-form">
                    <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                </div>
            </li>
            <li class="user-pro">
                {{--<a href="javascript:void(0)" class="waves-effect">--}}
                {{--<img src="{{ Auth::user()->imageUrl() }}" alt="user-img" class="img-circle">--}}
                {{--<span class="hide-menu">{{ Auth::user()->name }}</span>--}}
                {{--</a>--}}
            </li>


            <li>
                <a href="{{ url('/home') }}" class="waves-effect">
                    <i class="linea-icon fa fa-home fa-lg " data-icon="P"></i>
                    <span class="text-dark hide-menu">Home</span>
                </a>
            </li>

            <li>
                <a href="javascript:void(0);" class="waves-effect ">
                    <i class="linea-icon linea-weather fa-fw text-primary" data-icon=""></i>
                    <span class="hide-menu text-primary"> Quản lý<i class="fa arrow"></i></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('home/classes-list') }}">Danh sách lớp</a>
                    </li>
                    <li>
                        <a href="{{  url('home/student-list')  }}">Hồ sơ học sinh</a>
                    </li>
                    <li>
                        <a href="{{  url('home/scores-list')  }}">Danh sách bảng điểm</a>
                    </li>
                    <li>
                        <a href="{{  url('home/average-score')  }}">Bảng điểm trung bình</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0);" class="waves-effect">
                    <i class="linea-icon linea-ecommerce fa-fw " data-icon="R"></i>
                    <span class="hide-menu text-success"> Báo cáo<i class="fa arrow"></i></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('home/subject-summary') }}">Tổng kết môn</a>
                    </li>
                    <li>
                        <a href="{{ url('home/semester-summary') }}">Tổng kết học kỳ</a>
                    </li>
                </ul>
            <li>

            @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                <li>
                    <a href="{{ url('home/configurations')  }}" class="waves-effect">
                        <i data-icon="P" class="linea-icon linea-basic fa-fw"></i>
                        <span class="hide-menu text-blue">Cài đặt</span>
                    </a>
                    <a href="{{ url('home/profile')  }}" class="waves-effect">
                        <i data-icon="P" class="fa fa-user"></i>
                        <span class="hide-menu">Quản lý người dùng</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>