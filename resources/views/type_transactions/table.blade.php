<table class="table table-responsive" id="typeTransactions-table">
    <thead>
        <th>Name</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($typeTransactions as $typeTransaction)
        <tr>
            <td>{!! $typeTransaction->name !!}</td>
            <td>
                {!! Form::open(['route' => ['typeTransactions.destroy', $typeTransaction->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('typeTransactions.show', [$typeTransaction->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('typeTransactions.edit', [$typeTransaction->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>