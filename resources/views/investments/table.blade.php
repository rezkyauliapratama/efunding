<table class="table table-responsive" id="investments-table">
    <thead>
        <th>Total Investment</th>
        <th>Lend Id</th>
        <th>Campaign Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($investments as $investment)
        <tr>
            <td>{!! $investment->total_investment !!}</td>
            <td>{!! $investment->lend_id !!}</td>
            <td>{!! $investment->campaign_id !!}</td>
            <td>
                {!! Form::open(['route' => ['investments.destroy', $investment->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('investments.show', [$investment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('investments.edit', [$investment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>