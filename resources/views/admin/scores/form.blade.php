@php
    $students = App\Model\Student::pluck('full_name','id')->toArray();
@endphp

@if(!isset($score))
    <div class="form-group row {{ $errors->has('subject_type') ? 'has-error' : ''}}">
        {!! Form::label('subject_type', 'Danh sách môn học', ['class' => 'col-md-3 col-sm-5 col-form-label']) !!}
        <div class="col-md-5 col-sm-5">
            <select name="subject_type" style="width: 200px;" class="simple-dropdown">
                @foreach(\App\Model\Score::SUBJECT_TYPE as $key => $value)
                    <option value="{{ $value }}">
                        {{ \App\Model\Score::subjectTypeTextByKey($value) }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('subject_type', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    @else
    <div class="form-group row {{ $errors->has('subject_type') ? 'has-error' : ''}}">
        {!! Form::label('subject_type', 'Môn học', ['class' => 'col-md-3 col-sm-5 col-form-label']) !!}
        <div class="col-md-5 col-sm-5 ">
            {{$score->subjectTypeText()}}
            {{--{!! Form::select('student_id', \App\Model\Student::pluck('full_name', 'id'), null, ['class' => 'form-control simple-dropdown', 'required' => 'required']) !!}--}}
            {{--<select name="student_id" id="student_id" class="form-control">--}}
            {{--@foreach($students as $key => $student_name)--}}
            {{--<option value="{{$key}}">{{$student_name}}</option>--}}
            {{--@endforeach--}}
            {{--</select>--}}
            {{--{!! $errors->first('student_id', '<p class="help-block">:message</p>') !!}--}}
        </div>
    </div>

@endif

{{--@if(!isset($score))--}}
    {{--<div class="form-group row {{ $errors->has('class_id') ? 'has-error' : ''}}">--}}
        {{--{!! Form::label('class_id', 'Danh sách lớp', ['class' => 'col-md-3 col-sm-5 col-form-label']) !!}--}}
        {{--<div class="col-md-5 col-sm-5">--}}
            {{--{!! Form::select('class_id', \App\Model\Classes::pluck('class_name', 'id'), null, ['class' => 'form-control simple-dropdown', 'required' => 'required']) !!}--}}
            {{--{!! $errors->first('class_id', '<p class="help-block">:message</p>') !!}--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--@else--}}
    {{--<div class="form-group row {{ $errors->has('class_id') ? 'has-error' : ''}}">--}}
        {{--{!! Form::label('class_id', 'Lớp', ['class' => 'col-md-3 col-sm-5 col-form-label']) !!}--}}
        {{--<div class="col-md-5 col-sm-5 ">--}}
            {{--{{$score->student->classes->class_name}}--}}
            {{--{!! Form::select('student_id', \App\Model\Student::pluck('full_name', 'id'), null, ['class' => 'form-control simple-dropdown', 'required' => 'required']) !!}--}}
            {{--<select name="student_id" id="student_id" class="form-control">--}}
            {{--@foreach($students as $key => $student_name)--}}
            {{--<option value="{{$key}}">{{$student_name}}</option>--}}
            {{--@endforeach--}}
            {{--</select>--}}
            {{--{!! $errors->first('student_id', '<p class="help-block">:message</p>') !!}--}}
        {{--</div>--}}
    {{--</div>--}}

{{--@endif--}}


@if(!isset($score))
    <div class="form-group row {{ $errors->has('student_id') ? 'has-error' : ''}}">
        {!! Form::label('student_id', 'Danh sách học sinh', ['class' => 'col-md-3 col-sm-5 col-form-label']) !!}
        <div class="col-md-5 col-sm-5">
            {{--{!! Form::select('student_id', \App\Model\Student::pluck('full_name', 'id'), null, ['class' => 'form-control simple-dropdown', 'required' => 'required']) !!}--}}
            <select name="student_id" id="student_id" class="form-control">
                @foreach($students as $key => $student_name)
                    <option value="{{$key}}">{{$student_name}}</option>
                @endforeach
            </select>
            {!! $errors->first('student_id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
@else
    <div class="form-group row {{ $errors->has('student_id') ? 'has-error' : ''}}">
        {!! Form::label('student_id', 'Tên học sinh', ['class' => 'col-md-3 col-sm-5 col-form-label']) !!}
        <div class="col-md-5 col-sm-5 ">
            {{$score->student->full_name}}
            {{--{!! Form::select('student_id', \App\Model\Student::pluck('full_name', 'id'), null, ['class' => 'form-control simple-dropdown', 'required' => 'required']) !!}--}}
            {{--<select name="student_id" id="student_id" class="form-control">--}}
            {{--@foreach($students as $key => $student_name)--}}
            {{--<option value="{{$key}}">{{$student_name}}</option>--}}
            {{--@endforeach--}}
            {{--</select>--}}
            {{--{!! $errors->first('student_id', '<p class="help-block">:message</p>') !!}--}}
        </div>
    </div>
@endif


@if(!isset($score))
    <div class="form-group row {{ $errors->has('semester') ? 'has-error' : ''}}">
        {!! Form::label('semester', 'Học kỳ', ['class' => 'col-md-3 col-sm-5 col-form-label']) !!}
        <div class="col-md-9 col-sm-7">
            <div class="radio-list">
                <label class="radio-inline p-0">
                    <div class="radio radio-info">
                        {!! Form::radio('semester', '0', false, ['id' => 'semester_false']) !!}
                        {!! Form::label('semester_false', \App\Model\Score::SEMESTER_TYPE['SEMESTER1']) !!}
                    </div>
                </label>
                <label class="radio-inline p-0">
                    <div class="radio radio-danger">
                        {!! Form::radio('semester', '1', null, ['id' => 'semester_true']) !!}
                        {!! Form::label('semester_true', \App\Model\Score::SEMESTER_TYPE['SEMESTER2']) !!}
                    </div>
                </label>
            </div>
            {!! $errors->first('semester', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    @else
    <div class="form-group row {{ $errors->has('semester') ? 'has-error' : ''}}">
        {!! Form::label('semester', 'Học kỳ', ['class' => 'col-md-3 col-sm-5 col-form-label']) !!}
        <div class="col-md-5 col-sm-5 ">
            {{$score->semesterTypeText()}}
            {{--{!! Form::select('student_id', \App\Model\Student::pluck('full_name', 'id'), null, ['class' => 'form-control simple-dropdown', 'required' => 'required']) !!}--}}
            {{--<select name="student_id" id="student_id" class="form-control">--}}
            {{--@foreach($students as $key => $student_name)--}}
            {{--<option value="{{$key}}">{{$student_name}}</option>--}}
            {{--@endforeach--}}
            {{--</select>--}}
            {{--{!! $errors->first('student_id', '<p class="help-block">:message</p>') !!}--}}
        </div>
    </div>
@endif

<div class="form-group row {{ $errors->has('fifteenmin_exam_score') ? 'has-error' : ''}}">
    {!! Form::label('fifteenmin_exam_score', 'Điểm kiểm tra 15p', ['class' => 'col-md-3 col-sm-5 col-form-label']) !!}
    <div class="col-md-9 col-sm-7">
        {!! Form::text('fifteenmin_exam_score', null, ['class' => 'form-control']) !!}
        {!! $errors->first('fifteenmin_exam_score', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group row {{ $errors->has('fortyfivemin_exam_score') ? 'has-error' : ''}}">
    {!! Form::label('fortyfivemin_exam_score', 'Điểm kiểm tra 1 tiết', ['class' => 'col-md-3 col-sm-5 col-form-label']) !!}
    <div class="col-md-9 col-sm-7">
        {!! Form::text('fortyfivemin_exam_score', null, ['class' => 'form-control']) !!}
        {!! $errors->first('fortyfivemin_exam_score', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group">
    <div class="col-sm-12 text-right">
        <a href="{{ url('/home/scores-list') }}" class="btn btn-default">Huỷ Bỏ</a>
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Tạo Mới', ['class' => 'btn btn-success']) !!}
    </div>
</div>

@section('extra_scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#student_id').select2()
        });
    </script>
@endsection
