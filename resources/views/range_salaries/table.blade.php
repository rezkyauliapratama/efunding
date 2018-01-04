<table class="table table-responsive" id="rangeSalaries-table">
    <thead>
        <th>Name</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($rangeSalaries as $rangeSalary)
        <tr>
            <td>{!! $rangeSalary->name !!}</td>
            <td>
                {!! Form::open(['route' => ['rangeSalaries.destroy', $rangeSalary->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('rangeSalaries.show', [$rangeSalary->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('rangeSalaries.edit', [$rangeSalary->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>