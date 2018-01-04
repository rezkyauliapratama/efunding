<table class="table table-responsive" id="referrals-table">
    <thead>
        <th>User Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($referrals as $referral)
        <tr>
            <td>{!! $referral->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['referrals.destroy', $referral->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('referrals.show', [$referral->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('referrals.edit', [$referral->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>