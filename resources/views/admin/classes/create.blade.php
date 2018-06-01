@extends('layouts.app')

@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Tạo Hồ Sơ Học Sinh</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Admin</a></li>
                <li><a href="{{ url('/home/classes-list') }}">Danh sách lớp</a></li>
                <li class="active">Tạo hồ sơ học sinh</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                {!! Form::open(['url' => '/home/classes-list', 'class' => 'form-horizontal', 'files' => true]) !!}

                @include ('admin.classes.form')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
