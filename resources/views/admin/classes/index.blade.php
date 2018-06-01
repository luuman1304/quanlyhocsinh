@extends('layouts.app')

@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Danh sách học sinh các lớp </h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ url('home') }}">Admin</a></li>
                <li class="active">Danh sách lớp</li>
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
                                    <a href="{{ url('/home/classes-list/create') }}" class="btn btn-success pull-left">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Thêm học sinh
                                    </a>
                                </label>
                                <label>
                                    <a href="{{ empty($class_id)? url('/home/classes-list/download/0') : url('/home/classes-list/download').'/'.$class_id }}"
                                       class="btn btn-success pull-left">
                                        <i class="fa fa-file-excel-o" aria-hidden="true"></i> Xuất file báo cáo excel
                                    </a>
                                </label>
                            @endif
                            <label class="input-group">
                                Sỉ số: {{$total}}
                            </label>
                        </div>
                        <div class="dataTables_filter">
                            {!! Form::open(['method' => 'GET', 'url' => '/home/classes-list', 'class' => '', 'role' => 'search'])  !!}
                            <div class="input-group">
                                <select onchange="this.form.submit()" name="class_id" style="width: 200px;">
                                    <option value="" {{ $class_id ? '' : 'selected' }}>Tất cả</option>
                                    @foreach(\App\Model\Classes::select('class_name','id')->get() as $class)
                                        <option value="{{ $class->id }}" {{ $class_id != $class->id ? '' : 'selected' }}>{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                                <label>
                                    <input type="checkbox" name="is_male"
                                           value="1" onchange="this.form.submit()" {{ $isMale ? 'checked' : '' }}>
                                    {{ \App\Model\Student::GENDER_TYPE['MALE'] }}
                                </label>
                                <label>
                                    <input type="checkbox" name="is_female"
                                           value="1" onchange="this.form.submit()" {{ $isFemale ? 'checked' : '' }}>
                                    {{ \App\Model\Student::GENDER_TYPE['FEMALE'] }}
                                </label>
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
                                {{--<th>STT</th>--}}
                                <th>Lớp</th>
                                <th>Họ và tên</th>
                                <th>Giới tính</th>
                                <th>Năm sinh</th>
                                <th>Địa chỉ</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $item)
                                <tr>
                                    {{--<td>1</td>--}}
                                    <td>{{$item->classes->class_name}}</td>
                                    <td>{{$item->full_name}}</td>
                                    <td>{{$item->genderType()}}</td>
                                    <td>{{App\Services\CommonService::getYear($item->birthday)}}</td>
                                    <td>{{$item->address}}</td>
                                    <td class="text-nowrap">
                                        <a href="{{ url('/home/classes-list/'.$item->id) }}" data-toggle="tooltip"
                                           title="Xem" data-animation="false">
                                            <i class="fa fa-eye text-inverse m-l-5 m-r-5"></i>
                                        </a>
                                        @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                                            <a href="{{ url('/home/classes-list/'. $item->id.'/edit') }}"
                                               data-toggle="tooltip" title="Sửa" data-animation="false">
                                                <i class="fa fa-pencil-square-o text-inverse m-l-5 m-r-5"></i>
                                            </a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/home/classes-list',$item->id],
                                                'style' => 'display:inline'
                                                ]) !!}
                                            <a href="javascript:void(0);" data-toggle="tooltip" title="Xoá"
                                               data-animation="false"
                                               onclick="deleteItem(event, this, 'Bạn có muốn xoá học sinh này hay không?')">
                                                <i class="fa fa-close text-inverse m-l-5 m-r-5"></i>
                                            </a>
                                            {!! Form::close() !!}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="dataTables_paginate paging_simple_numbers">
                            {!! $students->appends(['q' => Request::get('q'),'class_id' => $class_id,'is_male'=>$isMale,'is_female'=> $isFemale])->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
