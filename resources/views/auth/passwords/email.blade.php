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
                <h3 class="box-title text-center">Quên mật khẩu</h3>
                <p class="text-muted">Nhập địa chỉ email và hướng dẫn sẽ được gửi đến bạn.</p>
                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" style="margin-left: 10px">Địa chỉ Email <span class="text-danger">*</span></label>

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control" name="email" placeholder="Nhập email"
                                   value="{{ old('email') }}" >

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                    type="submit">
                                Xác nhận
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
