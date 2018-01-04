<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $investment->id !!}</p>
</div>

<!-- Total Investment Field -->
<div class="form-group">
    {!! Form::label('total_investment', 'Total Investment:') !!}
    <p>{!! $investment->total_investment !!}</p>
</div>

<!-- Lend Id Field -->
<div class="form-group">
    {!! Form::label('lend_id', 'Lend Id:') !!}
    <p>{!! $investment->lend_id !!}</p>
</div>

<!-- Campaign Id Field -->
<div class="form-group">
    {!! Form::label('campaign_id', 'Campaign Id:') !!}
    <p>{!! $investment->campaign_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $investment->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $investment->updated_at !!}</p>
</div>

