<table class="table table-responsive" id="dtTransactions-table">
    <thead>
        <th>Name</th>
        <th>Transaction Id</th>
        <th>Investment Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($dtTransactions as $dtTransaction)
        <tr>
            <td>{!! $dtTransaction->name !!}</td>
            <td>{!! $dtTransaction->transaction_id !!}</td>
            <td>{!! $dtTransaction->investment_id !!}</td>
            <td>
                {!! Form::open(['route' => ['dtTransactions.destroy', $dtTransaction->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('dtTransactions.show', [$dtTransaction->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('dtTransactions.edit', [$dtTransaction->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>