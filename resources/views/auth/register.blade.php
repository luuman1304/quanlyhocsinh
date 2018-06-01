@extends('layouts.empty')

@section('content')
    <section id="wrapper" class="login-register">
        <div class="login-box">
            <div class="white-box">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <h3 class="box-title text-center">Đăng ký </h3>
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name"  style="margin-left: 10px" >Họ và tên<span class="text-danger"> *</span></label>

                        <div class="col-md-12">
                            <input id="name" type="text" class="form-control" name="name"
                                   value="{{ old('name') }}"
                                    autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" style="margin-left: 10px" >Địa chỉ email <span class="text-danger">*</span></label>

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control" name="email"
                                   value="{{ old('email') }}" >

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" style="margin-left: 10px" >Mật khẩu <span class="text-danger">*</span></label>

                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control" name="password" >

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" style="margin-left: 10px">Nhập lại mật khẩu <span class="text-danger">*</span></label>

                        <div class="col-md-12">
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" >
                        </div>
                    </div>

                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                    type="submit">
                               Đăng ký
                            </button>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <a href="{{route('login')}}"
                               class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light"
                               type="submit">
                                Quay lại
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
