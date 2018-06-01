@extends('layouts.app')

@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Bảng điểm học sinh</h4>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-7 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Admin</a></li>
                <li><a href="{{ url('/home/scores-list') }}">Danh sách bảng điểm</a></li>
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
                            {{ $score->student->full_name }}
                        </div>
                    </div>
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
                            Môn học
                        </label>
                        <div class="col-md-9 col-sm-7">
                            {{$score->subjectTypeText()}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-sm-5 col-form-label">
                            Học kỳ
                        </label>
                        <div class="col-md-9 col-sm-7">
                            {{$score->semesterTypeText()}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-sm-5 col-form-label">
                            Điểm 15'
                        </label>
                        <div class="col-md-9 col-sm-7">
                            {{$score->fifteenmin_exam_score}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-sm-5 col-form-label">
                            Điểm 1 tiết
                        </label>
                        <div class="col-md-9 col-sm-7">
                            {{$score->fortyfivemin_exam_score}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-sm-5 col-form-label">
                            Điểm trung bình môn
                        </label>
                        <div class="col-md-9 col-sm-7">
                            {{App\Services\CommonService::roundScore($score->student->subjectAverageScore($score->subject_type,$score->semester))}}
                        </div>
                    </div>
                    <div class="m-t-20">
                        <a href="{{ url('/home/scores-list') }}" class="btn btn-default">
                            Quay Lại
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
