<table class="table table-responsive" id="urbanVillages-table">
    <thead>
        <th>Name</th>
        <th>Sub District Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($urbanVillages as $urbanVillage)
        <tr>
            <td>{!! $urbanVillage->name !!}</td>
            <td>{!! $urbanVillage->sub_district_id !!}</td>
            <td>
                {!! Form::open(['route' => ['urbanVillages.destroy', $urbanVillage->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('urbanVillages.show', [$urbanVillage->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('urbanVillages.edit', [$urbanVillage->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>