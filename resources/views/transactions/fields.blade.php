<!-- Total Transaction Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_transaction', 'Total Transaction:') !!}
    {!! Form::text('total_transaction', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Transaction Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type_transaction_id', 'Type Transaction Id:') !!}
    {!! Form::text('type_transaction_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Lend Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lend_id', 'Lend Id:') !!}
    {!! Form::text('lend_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Bank Account Id From Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank_account_id_from', 'Bank Account Id From:') !!}
    {!! Form::text('bank_account_id_from', null, ['class' => 'form-control']) !!}
</div>

<!-- Bank Account Id To Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank_account_id_to', 'Bank Account Id To:') !!}
    {!! Form::text('bank_account_id_to', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('transactions.index') !!}" class="btn btn-default">Cancel</a>
</div>
