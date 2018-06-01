@extends('layouts.app')

@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Báo Cáo Tổng Kết Học Kỳ </h4>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-7 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Admin</a></li>
                <li><a href="{{ url('/home/semester-summary') }}">Báo Cáo Tổng Kết Học Kỳ</a></li>
                <li class="active">Chi Tiết</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="form-horizontal">
                    <div class="form-group row">
                        <label class="col-md-3 col-sm-5 col-form-label">
                            Lớp
                        </label>
                        <div class="col-md-9 col-sm-7">
                            {{  $score->student->classes->class_name }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-sm-5 col-form-label">
                            Sỉ số
                        </label>
                        <div class="col-md-9 col-sm-7">
                          ...
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-sm-5 col-form-label">
                           Số lượng đạt
                        </label>
                        <div class="col-md-9 col-sm-7">
                            ...
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-sm-5 col-form-label">
                            Tỉ lệ
                        </label>
                        <div class="col-md-9 col-sm-7">
                            ...
                        </div>
                    </div>
                    <div class="m-t-20">
                        <a href="{{ url('/home/semester-summary') }}" class="btn btn-default">
                            Quay Lại
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
