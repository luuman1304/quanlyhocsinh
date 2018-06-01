<div class="form-group row {{ $errors->has('full_name') ? 'has-error' : ''}}">
    {!! Form::label('full_name', 'Họ và tên', ['class' => 'col-md-3 col-sm-5 col-form-label']) !!}
    <div class="col-md-9 col-sm-7">
        {!! Form::text('full_name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('full_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('birthday') ? 'has-error' : ''}}" >
    {!! Form::label('birthday', 'Ngày sinh', ['class' => 'col-md-3 col-sm-5 col-form-label']) !!}
    <div class="col-md-9 col-sm-7">
        {!! Form::text('birthday', null, ['class' => 'form-control datepicker']) !!}
        {!! $errors->first('birthday', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'col-md-3 col-sm-5 col-form-label']) !!}
    <div class="col-md-9 col-sm-7">
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('gender') ? 'has-error' : ''}}">
    {!! Form::label('gender', 'Giới tính', ['class' => 'col-md-3 col-sm-5 col-form-label']) !!}
    <div class="col-md-9 col-sm-7">
        <div class="radio-list">
            <label class="radio-inline p-0">
                <div class="radio radio-info">
                    {!! Form::radio('gender', '1', true, ['id' => 'gender_true']) !!}
                    {!! Form::label('gender_true', \App\Model\Student::GENDER_TYPE['MALE']) !!}
                </div>
            </label>
            <label class="radio-inline p-0">
                <div class="radio radio-danger">
                    {!! Form::radio('gender', '0', null, ['id' => 'gender_false']) !!}
                    {!! Form::label('gender_false', \App\Model\Student::GENDER_TYPE['FEMALE']) !!}
                </div>
            </label>
        </div>
        {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group row {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('address', 'Địa chỉ', ['class' => 'col-md-3 col-sm-5 col-form-label']) !!}
    <div class="col-md-9 col-sm-7">
        {!! Form::text('address', null, ['class' => 'form-control']) !!}
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group">
    <div class="col-sm-12 text-right">
        <a href="{{ url('/home/student-list') }}" class="btn btn-default">Huỷ Bỏ</a>
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Tạo Mới', ['class' => 'btn btn-success']) !!}
    </div>
</div>
