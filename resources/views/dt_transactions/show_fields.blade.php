<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $dtTransaction->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $dtTransaction->name !!}</p>
</div>

<!-- Transaction Id Field -->
<div class="form-group">
    {!! Form::label('transaction_id', 'Transaction Id:') !!}
    <p>{!! $dtTransaction->transaction_id !!}</p>
</div>

<!-- Investment Id Field -->
<div class="form-group">
    {!! Form::label('investment_id', 'Investment Id:') !!}
    <p>{!! $dtTransaction->investment_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $dtTransaction->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $dtTransaction->updated_at !!}</p>
</div>

