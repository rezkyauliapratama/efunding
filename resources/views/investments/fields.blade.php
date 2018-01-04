<!-- Total Investment Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_investment', 'Total Investment:') !!}
    {!! Form::text('total_investment', null, ['class' => 'form-control']) !!}
</div>

<!-- Lend Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lend_id', 'Lend Id:') !!}
    {!! Form::text('lend_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Campaign Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('campaign_id', 'Campaign Id:') !!}
    {!! Form::text('campaign_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('investments.index') !!}" class="btn btn-default">Cancel</a>
</div>
