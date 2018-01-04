<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $bankAccount->id !!}</p>
</div>

<!-- Account Number Field -->
<div class="form-group">
    {!! Form::label('account_number', 'Account Number:') !!}
    <p>{!! $bankAccount->account_number !!}</p>
</div>

<!-- Bank Id Field -->
<div class="form-group">
    {!! Form::label('bank_id', 'Bank Id:') !!}
    <p>{!! $bankAccount->bank_id !!}</p>
</div>

<!-- Campaign Id Field -->
<div class="form-group">
    {!! Form::label('campaign_id', 'Campaign Id:') !!}
    <p>{!! $bankAccount->campaign_id !!}</p>
</div>

<!-- Lend Id Field -->
<div class="form-group">
    {!! Form::label('lend_id', 'Lend Id:') !!}
    <p>{!! $bankAccount->lend_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $bankAccount->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $bankAccount->updated_at !!}</p>
</div>

