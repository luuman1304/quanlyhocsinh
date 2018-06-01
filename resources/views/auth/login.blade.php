@extends('layouts.empty')

@section('content')
    <section id="wrapper" class="login-register">
        <div class="login-box">
            <div class="white-box">
                <form class="form-horizontal form-material" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <h3 class="box-title m-b-20">Đăng nhập</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" required="" placeholder="Địa chỉ email" id="email"
                                   name="email" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" placeholder="Mật khẩu" id="password"
                                   name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="remember" type="checkbox" name="remember">
                                <label for="checkbox-signup">Ghi nhớ mật khẩu</label>
                            </div>
                            <a href="{{ url('password/reset') }}" id="to-recover" class="text-dark pull-right">
                                <i class="fa fa-lock m-r-5"></i>
                                Quên mật khẩu?
                            </a>
                        </div>
                    </div>
                    <div class="text-danger">
                        <strong>{{$errors->first('email')}}</strong>
                    </div>

                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                    type="submit">
                                Đăng nhập
                            </button>
                        </div>
                    </div>

                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                           Chưa có tài khoản? <a class="create-account-hover" href="{{url('register')}}"><b>Đăng ký ngay</b></a>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </section>
@endsection
