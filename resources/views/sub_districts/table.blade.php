<table class="table table-responsive" id="subDistricts-table">
    <thead>
        <th>Name</th>
        <th>City Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($subDistricts as $subDistrict)
        <tr>
            <td>{!! $subDistrict->name !!}</td>
            <td>{!! $subDistrict->city_id !!}</td>
            <td>
                {!! Form::open(['route' => ['subDistricts.destroy', $subDistrict->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('subDistricts.show', [$subDistrict->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('subDistricts.edit', [$subDistrict->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>