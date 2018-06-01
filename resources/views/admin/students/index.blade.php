@extends('layouts.app')

@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Danh sách học sinh </h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ url('home') }}">Admin</a></li>
                <li class="active">Danh sách học sinh</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="table-responsive">
                    <div class="dataTables_wrapper no-footer">
                        <div class="dataTables_length">
                            <label class="form-control" >
                                Tổng số học sinh: {{$total}}
                            </label>
                        </div>
                        <div class="dataTables_filter">
                            {!! Form::open(['method' => 'GET', 'url' => '/home/student-list', 'class' => '', 'role' => 'search'])  !!}
                            <div class="input-group">
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
                                <th>Họ và tên</th>
                                <th>Ngày sinh</th>
                                <th>Email</th>
                                <th>Giới tính</th>
                                <th>Địa chỉ</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $item)
                                <tr>
                                    {{--<td>1</td>--}}
                                    <td>{{$item->full_name}}</td>
                                    <td>{{\App\Services\CommonService::formatBirthday($item->birthday)}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->genderType()}}</td>
                                    <td>{{$item->address}}</td>
                                    <td class="text-nowrap">
                                        <a href="{{ url('/home/student-list/'.$item->id) }}" data-toggle="tooltip"
                                           title="Xem" data-animation="false">
                                            <i class="fa fa-eye text-inverse m-l-5 m-r-5"></i>
                                        </a>
                                        @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                                        <a href="{{ url('/home/student-list/'. $item->id.'/edit') }}"
                                           data-toggle="tooltip" title="Sửa" data-animation="false">
                                            <i class="fa fa-pencil-square-o text-inverse m-l-5 m-r-5"></i>
                                        </a>
                                        {!! Form::open([
                                            'method'=>'DELETE',
                                            'url' => ['/home/student-list', $item->id],
                                            'style' => 'display:inline'
                                            ]) !!}
                                            <a href="javascript:void(0);" data-toggle="tooltip" title="Xoá"
                                               data-animation="false"
                                               onclick="deleteItem(event, this, 'Bạn có muốn xoá học sinh này hay không?')">
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
                            {!! $students->appends(['q' => Request::get('q')])->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
