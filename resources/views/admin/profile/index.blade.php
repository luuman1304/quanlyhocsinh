@extends('layouts.app')

@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Danh sách người dùng</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ url('home') }}">Admin</a></li>
                <li class="active">Danh sách người dùng</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="table-responsive">
                    <div class="dataTables_wrapper no-footer">
                        <div class="dataTables_filter">
                            {!! Form::open(['method' => 'GET', 'url' => '/home/profile', 'class' => '', 'role' => 'search'])  !!}
                            <div class="input-group">
                                <select onchange="this.form.submit()" name="role_id" style="width: 200px;">
                                    <option value="" {{ $role_id == "" ? '' : 'selected' }}>Tất cả</option>
                                    @foreach(\App\Model\Role::select('role_name','id')->get() as $role)
                                        <option value="{{ $role->id }}" {{ $role_id != $role->id ? '' : 'selected' }}>{{ $role->role_name }}</option>
                                    @endforeach
                                </select>
                                <input type="text" class="form-control search-text" name="q"
                                       value="{{ Request::get('q') }}" placeholder="Tìm theo tên hoặc email...">
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
                                <th>Email</th>
                                <th>Quyền</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $item)
                                <tr>
                                    {{--<td>1</td>--}}
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->roleTypeText()}}</td>
                                    <td class="text-nowrap">
                                        <a href="{{ url('/home/profile/'.$item->user_id) }}" data-toggle="tooltip"
                                           title="Xem" data-animation="false">
                                            <i class="fa fa-eye text-inverse m-l-5 m-r-5"></i>
                                        </a>
                                        <a href="{{ url('/home/profile/'. $item->user_id.'/edit') }}"
                                           data-toggle="tooltip" title="Sửa" data-animation="false">
                                            <i class="fa fa-pencil-square-o text-inverse m-l-5 m-r-5"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="dataTables_paginate paging_simple_numbers">
                            {!! $users->appends(['q' => Request::get('q')])->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
