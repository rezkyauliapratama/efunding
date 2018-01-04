<table class="table table-responsive" id="identityTypes-table">
    <thead>
        <th>Name</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($identityTypes as $identityType)
        <tr>
            <td>{!! $identityType->name !!}</td>
            <td>
                {!! Form::open(['route' => ['identityTypes.destroy', $identityType->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('identityTypes.show', [$identityType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('identityTypes.edit', [$identityType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>