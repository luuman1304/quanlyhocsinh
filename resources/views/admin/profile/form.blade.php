<div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Họ và tên', ['class' => 'col-md-3 col-sm-5 col-form-label']) !!}
    <div class="col-md-9 col-sm-7">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('role_id') ? 'has-error' : ''}}">
    {!! Form::label('role_id', 'Quyền', ['class' => 'col-md-3 col-sm-5 col-form-label']) !!}
    <div class="col-md-5 col-sm-5">
        {!! Form::select('role_id', \App\Model\Role::pluck('role_name', 'id'), null, ['class' => 'form-control simple-dropdown']) !!}
        {!! $errors->first('role_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group">
    <div class="col-sm-12 text-right">
        <a href="{{ url('/home/profile') }}" class="btn btn-default">Huỷ Bỏ</a>
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Tạo Mới', ['class' => 'btn btn-success']) !!}
    </div>
</div>
