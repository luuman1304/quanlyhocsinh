@extends('layouts.app')

@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Chỉnh Sửa Hồ Sơ Cá Nhân</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Admin</a></li>
                <li><a href="{{ url('/home/profile') }}">Danh sách người dùng</a></li>
                <li class="active">Chỉnh sửa</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                {!! Form::model($user, ['method' => 'PATCH', 'url' => ['/home/profile', $user->id], 'class' => 'form-horizontal', 'files' => true]) !!}

                @include ('admin.profile.form', ['submitButtonText' => 'Cập Nhật'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
