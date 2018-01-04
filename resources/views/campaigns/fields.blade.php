<!-- Estimated Return Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estimated_return', 'Estimated Return:') !!}
    {!! Form::text('estimated_return', null, ['class' => 'form-control']) !!}
</div>

<!-- Time Range Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time_range', 'Time Range:') !!}
    {!! Form::text('time_range', null, ['class' => 'form-control']) !!}
</div>

<!-- Started At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('started_at', 'Started At:') !!}
    {!! Form::date('started_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Deadline Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deadline', 'Deadline:') !!}
    {!! Form::date('deadline', null, ['class' => 'form-control']) !!}
</div>

<!-- Target Investment Field -->
<div class="form-group col-sm-6">
    {!! Form::label('target_investment', 'Target Investment:') !!}
    {!! Form::text('target_investment', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Long Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('long_description', 'Long Description:') !!}
    {!! Form::textarea('long_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::text('image', null, ['class' => 'form-control']) !!}
</div>

<!-- Akad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('akad_id', 'Akad Id:') !!}
    {!! Form::text('akad_id', null, ['class' => 'form-control']) !!}
</div>

<!-- City Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city_id', 'City Id:') !!}
    {!! Form::text('city_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Category Id:') !!}
    {!! Form::text('category_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Borrower Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('borrower_id', 'Borrower Id:') !!}
    {!! Form::text('borrower_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('campaigns.index') !!}" class="btn btn-default">Cancel</a>
</div>
