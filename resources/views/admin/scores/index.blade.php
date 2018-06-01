@extends('layouts.app')

@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Danh sách bảng điểm </h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ url('home') }}">Admin</a></li>
                <li class="active">Danh sách bảng điểm</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="table-responsive">
                    <div class="dataTables_wrapper no-footer">
                        <div class="dataTables_length">
                            @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                                <label>
                                    <a href="{{ url('/home/scores-list/create') }}" class="btn btn-success pull-left">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Thêm bảng điểm
                                    </a>
                                </label>
                            @endif
                        </div>
                        <div class="dataTables_filter">
                            {!! Form::open(['method' => 'GET', 'url' => '/home/scores-list', 'class' => '', 'role' => 'search'])  !!}
                            <div class="input-group">
                                <select name="subject_type" onchange="this.form.submit()" style="width: 200px;">
                                    <option value="">Chọn môn học</option>
                                    @foreach(\App\Model\Score::SUBJECT_TYPE as $key => $value)
                                        <option value="{{ $value }}" {{$value == $subject_type ? 'selected' : ''}}>
                                            {{ \App\Model\Score::subjectTypeTextByKey($value) }}
                                        </option>
                                    @endforeach
                                </select>
                                <select name="semester" onchange="this.form.submit()" style="width: 100px;">
                                    <option value="">Chọn học kỳ</option>
                                    <option value="0" {{$semester!= null && $semester == 0 ? 'selected' : ''}}>{{\App\Model\Score::SEMESTER_TYPE['SEMESTER1']}}</option>
                                    <option value="1" {{$semester == 1 ? 'selected' : ''}}>{{\App\Model\Score::SEMESTER_TYPE['SEMESTER2']}}</option>
                                </select>

                                <select onchange="this.form.submit()" name="class_id" style="width: 200px;">
                                    <option value="">Chọn lớp</option>
                                    @foreach(\App\Model\Classes::select('class_name','id')->get() as $class)
                                        <option value="{{ $class->id }}" {{ $class_id != $class->id ? '' : 'selected' }}>{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                                <input type="text" class="form-control search-text" name="q"
                                       value="{{ Request::get('q') }}" placeholder="Tìm theo tên học sinh...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        Tìm <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <table class="table table-borderless table-striped">
                            <thead>
                            <tr>
                                <th>Lớp</th>
                                <th>Môn</th>
                                <th>Họ và tên</th>
                                <th>Điểm 15'</th>
                                <th>Điểm 1 tiết</th>
                                <th>Điểm TB</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $item)
                                <tr>
                                    <td>{{$item->classes->class_name}}</td>
                                    <td>{{ \App\Model\Score::SUBJECT_TYPE_TEXT[array_keys(\App\Model\Score::SUBJECT_TYPE, $subjectType)[0]] }}</td>
                                    <td>{{$item->full_name}}</td>
                                    <td>{{$item->getFifteenMinScore($subjectType,$semester)}}</td>
                                    <td>{{$item->getFortyFiveMinScore($subjectType,$semester)}}</td>
                                    <td>{{App\Services\CommonService::roundScore($item->subjectAverageScore($subjectType,$semester)) }}</td>
                                    <td class="text-nowrap">
                                        <a href="{{ url('/home/scores-list/'.$item->score_id) }}" data-toggle="tooltip"
                                           title="Xem" data-animation="false">
                                            <i class="fa fa-eye text-inverse m-l-5 m-r-5"></i>
                                        </a>
                                        @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                                        <a href="{{ url('/home/scores-list/'. $item->score_id.'/edit') }}"
                                           data-toggle="tooltip" title="Sửa" data-animation="false">
                                            <i class="fa fa-pencil-square-o text-inverse m-l-5 m-r-5"></i>
                                        </a>
                                        {!! Form::open([
                                            'method'=>'DELETE',
                                            'url' => ['/home/scores-list',$item->score_id],
                                            'style' => 'display:inline'
                                            ]) !!}
                                        <a href="javascript:void(0);" data-toggle="tooltip" title="Xoá"
                                           data-animation="false"
                                           onclick="deleteItem(event, this, 'Bạn có muốn xoá bảng điểm này hay không?')">
                                            <i class="fa fa-close text-inverse m-l-5 m-r-5"></i>
                                        </a>
                                        @endif
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="dataTables_paginate paging_simple_numbers">
                            {!! $students->appends(['q' => Request::get('q'),'subject_type' => $subjectType, 'semester' => $semester,'class_id' => $class_id])->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
