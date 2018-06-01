@extends('layouts.app')

@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Hồ sơ học sinh</h4>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-7 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Admin</a></li>
                <li><a href="{{ url('/home/student-list') }}">Danh sách học sinh</a></li>
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
                            Họ và tên
                        </label>
                        <div class="col-md-9 col-sm-7">
                            {{ $student->full_name }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-sm-5 col-form-label">
                            Ngày sinh
                        </label>
                        <div class="col-md-9 col-sm-7">
                            {{  \App\Services\CommonService::formatBirthday($student->birthday) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-sm-5 col-form-label">
                            Email
                        </label>
                        <div class="col-md-9 col-sm-7">
                            {{$student->email}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-sm-5 col-form-label">
                            Giới tính
                        </label>
                        <div class="col-md-9 col-sm-7">
                            {{$student->genderType()}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-sm-5 col-form-label">
                            Địa chỉ
                        </label>
                        <div class="col-md-9 col-sm-7">
                            {{$student->address}}
                        </div>
                    </div>
                    <div class="m-t-20">
                        <a href="{{ url('/home/student-list') }}" class="btn btn-default">
                            Quay Lại
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
