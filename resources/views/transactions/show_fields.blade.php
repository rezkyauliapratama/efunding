<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $transaction->id !!}</p>
</div>

<!-- Total Transaction Field -->
<div class="form-group">
    {!! Form::label('total_transaction', 'Total Transaction:') !!}
    <p>{!! $transaction->total_transaction !!}</p>
</div>

<!-- Type Transaction Id Field -->
<div class="form-group">
    {!! Form::label('type_transaction_id', 'Type Transaction Id:') !!}
    <p>{!! $transaction->type_transaction_id !!}</p>
</div>

<!-- Lend Id Field -->
<div class="form-group">
    {!! Form::label('lend_id', 'Lend Id:') !!}
    <p>{!! $transaction->lend_id !!}</p>
</div>

<!-- Bank Account Id From Field -->
<div class="form-group">
    {!! Form::label('bank_account_id_from', 'Bank Account Id From:') !!}
    <p>{!! $transaction->bank_account_id_from !!}</p>
</div>

<!-- Bank Account Id To Field -->
<div class="form-group">
    {!! Form::label('bank_account_id_to', 'Bank Account Id To:') !!}
    <p>{!! $transaction->bank_account_id_to !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $transaction->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $transaction->updated_at !!}</p>
</div>

