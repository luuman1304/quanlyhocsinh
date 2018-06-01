<div class="form-group row {{ $errors->has('max_student_per_class') ? 'has-error' : ''}}">
    {!! Form::label('max_student_per_class', 'Sỉ số tối đa', ['class' => 'col-md-3 col-sm-5 col-form-label']) !!}
    <div class="col-md-9 col-sm-7">
        {!! Form::text('max_student_per_class', null, ['class' => 'form-control', 'maxlength' => '2']) !!}
        {!! $errors->first('max_student_per_class', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('min_student_age') ? 'has-error' : ''}}">
    {!! Form::label('min_student_age', 'Tuổi tối thiểu', ['class' => 'col-md-3 col-sm-5 col-form-label']) !!}
    <div class="col-md-9 col-sm-7">
        {!! Form::text('min_student_age', null, ['class' => 'form-control']) !!}
        {!! $errors->first('min_student_age', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('max_student_age') ? 'has-error' : ''}}">
    {!! Form::label('max_student_age', 'Tuổi tối đa', ['class' => 'col-md-3 col-sm-5 col-form-label']) !!}
    <div class="col-md-9 col-sm-7">
        {!! Form::text('max_student_age', null, ['class' => 'form-control']) !!}
        {!! $errors->first('max_student_age', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('numb_of_subject') ? 'has-error' : ''}}">
    {!! Form::label('numb_of_subject', 'Số lượng môn học', ['class' => 'col-md-3 col-sm-5 col-form-label']) !!}
    <div class="col-md-9 col-sm-7">
        {!! Form::text('numb_of_subject', null, ['class' => 'form-control']) !!}
        {!! $errors->first('numb_of_subject', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('pass_condition_score') ? 'has-error' : ''}}">
    {!! Form::label('pass_condition_score', 'Điều kiện đạt', ['class' => 'col-md-3 col-sm-5 col-form-label']) !!}
    <div class="col-md-9 col-sm-7">
        {!! Form::text('pass_condition_score', null, ['class' => 'form-control']) !!}
        {!! $errors->first('pass_condition_score', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group">
    <div class="col-sm-12 text-right">
        <a href="{{ url('/home/configurations') }}" class="btn btn-default">Huỷ Bỏ</a>
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Tạo Mới', ['class' => 'btn btn-success']) !!}
    </div>
</div>
