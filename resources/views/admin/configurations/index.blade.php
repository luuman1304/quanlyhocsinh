@extends('layouts.app')

@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Quy Định </h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ url('home') }}">Admin</a></li>
                <li class="active">Quy Định</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="table-responsive">
                    <div class="dataTables_wrapper no-footer">
                        <table class="table table-borderless table-striped">
                            <thead>
                            <tr>
                                <th>Sỉ số tối đa</th>
                                <th>Tuổi tối thiểu</th>
                                <th>Tuổi tối đa</th>
                                <th>Số lượng môn học</th>
                                <th>Điều kiện đạt</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($config as $item)
                                <tr>
                                    <td>{{$item->max_student_per_class}}</td>
                                    <td>{{$item->min_student_age}}</td>
                                    <td>{{$item->max_student_age}}</td>
                                    <td>{{$item->numb_of_subject}}</td>
                                    <td>{{$item->pass_condition_score}}.0</td>
                                    <td class="text-nowrap">
                                        <a href="{{ url('/home/configurations/' . $item->id . '/edit') }}"
                                           data-toggle="tooltip" title="Sửa" data-animation="false">
                                            <i class="fa fa-pencil-square-o text-inverse m-l-5 m-r-5"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
