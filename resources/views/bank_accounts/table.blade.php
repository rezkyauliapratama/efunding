<table class="table table-responsive" id="bankAccounts-table">
    <thead>
        <th>Account Number</th>
        <th>Bank Id</th>
        <th>Campaign Id</th>
        <th>Lend Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($bankAccounts as $bankAccount)
        <tr>
            <td>{!! $bankAccount->account_number !!}</td>
            <td>{!! $bankAccount->bank_id !!}</td>
            <td>{!! $bankAccount->campaign_id !!}</td>
            <td>{!! $bankAccount->lend_id !!}</td>
            <td>
                {!! Form::open(['route' => ['bankAccounts.destroy', $bankAccount->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('bankAccounts.show', [$bankAccount->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('bankAccounts.edit', [$bankAccount->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>