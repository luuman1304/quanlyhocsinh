@extends('layouts.app')

@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Báo Cáo Tổng Kết Học Kỳ </h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ url('home') }}">Admin</a></li>
                <li class="active">Báo Cáo Tổng Kết Học Kỳ</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="table-responsive">
                    <div class="dataTables_wrapper no-footer">
                        <div class="dataTables_filter">
                            {!! Form::open(['method' => 'GET', 'url' => '/home/semester-summary', 'class' => '', 'role' => 'search'])  !!}
                            <div class="input-group">
                                {{--<select name="subject_type" onchange="this.form.submit()" style="width: 200px;">--}}
                                    {{--<option>Chọn môn học</option>--}}
                                    {{--@foreach(\App\Model\Score::SUBJECT_TYPE as $key => $value)--}}
                                        {{--<option value="{{ $value }}" {{$value == $subject_type ? 'selected' : ''}}>--}}
                                            {{--{{ \App\Model\Score::subjectTypeTextByKey($value) }}--}}
                                        {{--</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                                <select name="semester" onchange="this.form.submit()" style="width: 100px;height: 35px">
                                    <option value="-1">Chọn học kỳ</option>
                                    <option value="0" {{$semester != null && $semester == 0 ? 'selected' : ''}}>{{\App\Model\Score::SEMESTER_TYPE['SEMESTER1']}}</option>
                                    <option value="1" {{$semester == 1 ? 'selected' : ''}}>{{\App\Model\Score::SEMESTER_TYPE['SEMESTER2']}}</option>
                                </select>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <table class="table table-borderless table-striped">
                            <thead>
                            <tr>
                                <th>Lớp</th>
                                <th>Sỉ số</th>
                                <th>Số lượng đạt</th>
                                <th>Tỉ lệ</th>
                                {{--<th>Thao tác</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($classes as $item)
                                <tr>
                                    <td>{{ $item->class_name}}</td>
                                    <td>{{ $item->total }}</td>
                                    <td>{{App\Model\Classes::numberOfPassesSemester($semester,$item->id)}}</td>
                                    <td>{{App\Services\CommonService::roundScore(App\Model\Classes::percentPassSemester($semester,$item->id)/$item->total) }}%</td>
                                    {{--<td class="text-nowrap">--}}
                                        {{--<a href="{{ url('/home/semester-summary/'.$item->id) }}" data-toggle="tooltip"--}}
                                           {{--title="Xem" data-animation="false">--}}
                                            {{--<i class="fa fa-eye text-inverse m-l-5 m-r-5"></i>--}}
                                        {{--</a>--}}
                                    {{--</td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="dataTables_paginate paging_simple_numbers">
                            {!! $classes->appends(['semester' => $semester])->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
