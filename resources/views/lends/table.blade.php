<table class="table table-responsive" id="lends-table">
    <thead>
        <th>Name</th>
        <th>Birth Date</th>
        <th>Birth Place</th>
        <th>Gender</th>
        <th>Last Education</th>
        <th>Married Status</th>
        <th>Religion</th>
        <th>Phone Number</th>
        <th>Facebook Url</th>
        <th>Instagram Twitter Url</th>
        <th>Website Url</th>
        <th>Address</th>
        <th>Identity Number</th>
        <th>Identity Image</th>
        <th>Npwp Number</th>
        <th>Npwp Image</th>
        <th>Work</th>
        <th>Field Work</th>
        <th>Heir</th>
        <th>Heir Phone Number</th>
        <th>Relation With Heir</th>
        <th>User Id</th>
        <th>Identity Type Id</th>
        <th>Range Salary Id</th>
        <th>Province Id</th>
        <th>City Id</th>
        <th>Sub District Id</th>
        <th>Urban Village Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($lends as $lend)
        <tr>
            <td>{!! $lend->name !!}</td>
            <td>{!! $lend->birth_date !!}</td>
            <td>{!! $lend->birth_place !!}</td>
            <td>{!! $lend->gender !!}</td>
            <td>{!! $lend->last_education !!}</td>
            <td>{!! $lend->married_status !!}</td>
            <td>{!! $lend->religion !!}</td>
            <td>{!! $lend->phone_number !!}</td>
            <td>{!! $lend->facebook_url !!}</td>
            <td>{!! $lend->instagram_twitter_url !!}</td>
            <td>{!! $lend->website_url !!}</td>
            <td>{!! $lend->address !!}</td>
            <td>{!! $lend->identity_number !!}</td>
            <td>{!! $lend->identity_image !!}</td>
            <td>{!! $lend->npwp_number !!}</td>
            <td>{!! $lend->npwp_image !!}</td>
            <td>{!! $lend->work !!}</td>
            <td>{!! $lend->field_work !!}</td>
            <td>{!! $lend->heir !!}</td>
            <td>{!! $lend->heir_phone_number !!}</td>
            <td>{!! $lend->relation_with_heir !!}</td>
            <td>{!! $lend->user_id !!}</td>
            <td>{!! $lend->identity_type_id !!}</td>
            <td>{!! $lend->range_salary_id !!}</td>
            <td>{!! $lend->province_id !!}</td>
            <td>{!! $lend->city_id !!}</td>
            <td>{!! $lend->sub_district_id !!}</td>
            <td>{!! $lend->urban_village_id !!}</td>
            <td>
                {!! Form::open(['route' => ['lends.destroy', $lend->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('lends.show', [$lend->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('lends.edit', [$lend->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>