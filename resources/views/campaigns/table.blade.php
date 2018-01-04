<table class="table table-responsive" id="campaigns-table">
    <thead>
        <th>Estimated Return</th>
        <th>Time Range</th>
        <th>Started At</th>
        <th>Deadline</th>
        <th>Target Investment</th>
        <th>Description</th>
        <th>Long Description</th>
        <th>Image</th>
        <th>Akad Id</th>
        <th>City Id</th>
        <th>Category Id</th>
        <th>Borrower Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($campaigns as $campaign)
        <tr>
            <td>{!! $campaign->estimated_return !!}</td>
            <td>{!! $campaign->time_range !!}</td>
            <td>{!! $campaign->started_at !!}</td>
            <td>{!! $campaign->deadline !!}</td>
            <td>{!! $campaign->target_investment !!}</td>
            <td>{!! $campaign->description !!}</td>
            <td>{!! $campaign->long_description !!}</td>
            <td>{!! $campaign->image !!}</td>
            <td>{!! $campaign->akad_id !!}</td>
            <td>{!! $campaign->city_id !!}</td>
            <td>{!! $campaign->category_id !!}</td>
            <td>{!! $campaign->borrower_id !!}</td>
            <td>
                {!! Form::open(['route' => ['campaigns.destroy', $campaign->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('campaigns.show', [$campaign->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('campaigns.edit', [$campaign->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>