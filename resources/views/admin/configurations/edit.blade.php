@extends('layouts.app')

@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Chỉnh Sửa Quy Định</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Admin</a></li>
                <li><a href="{{ url('/home/configurations') }}">Quy Định</a></li>
                <li class="active">Chỉnh Sửa Quy Định</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                {!! Form::model($config, ['method' => 'PATCH', 'url' => ['/home/configurations', $config->id], 'class' => 'form-horizontal']) !!}

                @include ('admin.configurations.form', ['submitButtonText' => 'Cập nhật'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
