<table class="table table-responsive" id="transactions-table">
    <thead>
        <th>Total Transaction</th>
        <th>Type Transaction Id</th>
        <th>Lend Id</th>
        <th>Bank Account Id From</th>
        <th>Bank Account Id To</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($transactions as $transaction)
        <tr>
            <td>{!! $transaction->total_transaction !!}</td>
            <td>{!! $transaction->type_transaction_id !!}</td>
            <td>{!! $transaction->lend_id !!}</td>
            <td>{!! $transaction->bank_account_id_from !!}</td>
            <td>{!! $transaction->bank_account_id_to !!}</td>
            <td>
                {!! Form::open(['route' => ['transactions.destroy', $transaction->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('transactions.show', [$transaction->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('transactions.edit', [$transaction->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>