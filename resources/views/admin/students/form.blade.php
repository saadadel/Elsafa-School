<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('phone') ? 'has-error' : ''}}">
    {!! Form::label('phone', 'Phone', ['class' => 'control-label']) !!}
    {!! Form::text('phone', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
    {!! Form::text('email', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('stage') ? 'has-error' : ''}}">
    {!! Form::label('stage', 'Stage', ['class' => 'control-label']) !!}
    {!! Form::text('stage', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('stage', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('stage_year') ? 'has-error' : ''}}">
    {!! Form::label('stage_year', 'Stage Year', ['class' => 'control-label']) !!}
    {!! Form::number('stage_year', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('stage_year', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('birthdate') ? 'has-error' : ''}}">
    {!! Form::label('birthdate', 'Birthdate', ['class' => 'control-label']) !!}
    {!! Form::date('birthdate', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('birthdate', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('academic_year') ? 'has-error' : ''}}">
    {!! Form::label('academic_year', 'Academic Year', ['class' => 'control-label']) !!}
    {!! Form::text('academic_year', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('academic_year', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('monthly_evaluation') ? 'has-error' : ''}}">
    {!! Form::label('monthly_evaluation', 'Monthly Evaluation', ['class' => 'control-label']) !!}
    {!! Form::text('monthly_evaluation', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('monthly_evaluation', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('religion') ? 'has-error' : ''}}">
    {!! Form::label('religion', 'Religion', ['class' => 'control-label']) !!}
    {!! Form::text('religion', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('religion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('national_id') ? 'has-error' : ''}}">
    {!! Form::label('national_id', 'National Id', ['class' => 'control-label']) !!}
    {!! Form::number('national_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('national_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('parent_national_id') ? 'has-error' : ''}}">
    {!! Form::label('parent_national_id', 'Parent National Id', ['class' => 'control-label']) !!}
    {!! Form::number('parent_national_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('parent_national_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('parent_phone') ? 'has-error' : ''}}">
    {!! Form::label('parent_phone', 'Parent Phone', ['class' => 'control-label']) !!}
    {!! Form::text('parent_phone', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('parent_phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('parent_email') ? 'has-error' : ''}}">
    {!! Form::label('parent_email', 'Parent Email', ['class' => 'control-label']) !!}
    {!! Form::text('parent_email', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('parent_email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('parent_social_status') ? 'has-error' : ''}}">
    {!! Form::label('parent_social_status', 'Parent Social Status', ['class' => 'control-label']) !!}
    {!! Form::text('parent_social_status', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('parent_social_status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('parent_qualification') ? 'has-error' : ''}}">
    {!! Form::label('parent_qualification', 'Parent Qualification', ['class' => 'control-label']) !!}
    {!! Form::text('parent_qualification', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('parent_qualification', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('parent_name') ? 'has-error' : ''}}">
    {!! Form::label('parent_name', 'Parent Name', ['class' => 'control-label']) !!}
    {!! Form::text('parent_name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('parent_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('fees') ? 'has-error' : ''}}">
    {!! Form::label('fees', 'Fees', ['class' => 'control-label']) !!}
    {!! Form::text('fees', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('fees', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
