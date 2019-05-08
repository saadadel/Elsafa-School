<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('national_id') ? 'has-error' : ''}}">
    {!! Form::label('national_id', 'National Id', ['class' => 'control-label']) !!}
    {!! Form::text('national_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('national_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('phone') ? 'has-error' : ''}}">
    {!! Form::label('phone', 'Phone', ['class' => 'control-label']) !!}
    {!! Form::text('phone', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
    {!! Form::email('email', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('birthdate') ? 'has-error' : ''}}">
    {!! Form::label('birthdate', 'Birthdate', ['class' => 'control-label']) !!}
    {!! Form::date('birthdate', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('birthdate', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('social_status') ? 'has-error' : ''}}">
    {!! Form::label('social_status', 'Social Status', ['class' => 'control-label']) !!}
    {!! Form::text('social_status', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('social_status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('qualification') ? 'has-error' : ''}}">
    {!! Form::label('qualification', 'Qualification', ['class' => 'control-label']) !!}
    {!! Form::text('qualification', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('qualification', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('religion') ? 'has-error' : ''}}">
    {!! Form::label('religion', 'Religion', ['class' => 'control-label']) !!}
    {!! Form::text('religion', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('religion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('degree') ? 'has-error' : ''}}">
    {!! Form::label('degree', 'Degree', ['class' => 'control-label']) !!}
    {!! Form::text('degree', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('degree', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('subject') ? 'has-error' : ''}}">
    {!! Form::label('subject', 'Subject', ['class' => 'control-label']) !!}
    {!! Form::text('subject', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('subject', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('salary') ? 'has-error' : ''}}">
    {!! Form::label('salary', 'Salary', ['class' => 'control-label']) !!}
    {!! Form::number('salary', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('salary', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('st_name') ? 'has-error' : ''}}">
    {!! Form::label('st_name', 'St Name', ['class' => 'control-label']) !!}
    {!! Form::text('st_name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('st_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('building_num') ? 'has-error' : ''}}">
    {!! Form::label('building_num', 'Building Num', ['class' => 'control-label']) !!}
    {!! Form::number('building_num', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('building_num', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('region') ? 'has-error' : ''}}">
    {!! Form::label('region', 'Region', ['class' => 'control-label']) !!}
    {!! Form::text('region', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('region', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('city') ? 'has-error' : ''}}">
    {!! Form::label('city', 'City', ['class' => 'control-label']) !!}
    {!! Form::text('city', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('country') ? 'has-error' : ''}}">
    {!! Form::label('country', 'Country', ['class' => 'control-label']) !!}
    {!! Form::text('country', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
