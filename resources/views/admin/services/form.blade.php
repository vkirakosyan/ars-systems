<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Title', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('title', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('percentage') ? 'has-error' : ''}}">
    {!! Form::label('percentage', 'Percentage', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('percentage', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required', 'min' => 0, 'max' => '100'] : ['class' => 'form-control', 'min'=>0,'max'=>100]) !!}
        {!! $errors->first('percentage', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
