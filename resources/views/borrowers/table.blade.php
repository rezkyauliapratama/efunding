<table class="table table-responsive" id="borrowers-table">
    <thead>
        <th>Address</th>
        <th>Birth Date</th>
        <th>Birth Place</th>
        <th>Facebook Url</th>
        <th>Field Work</th>
        <th>Gender</th>
        <th>Heir</th>
        <th>Heir Phone Number</th>
        <th>Identity Image</th>
        <th>Identity Number</th>
        <th>Instagram Twitter Url</th>
        <th>Last Education</th>
        <th>Married Status</th>
        <th>Name</th>
        <th>Npwp Image</th>
        <th>Npwp Number</th>
        <th>Phone Number</th>
        <th>Relation With Heir</th>
        <th>Religion</th>
        <th>Website Url</th>
        <th>Work</th>
        <th>User Id</th>
        <th>Identity Type Id</th>
        <th>Range Salary Id</th>
        <th>Sub District Id</th>
        <th>City Id</th>
        <th>Province Id</th>
        <th>Urban Village Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($borrowers as $borrower)
        <tr>
            <td>{!! $borrower->address !!}</td>
            <td>{!! $borrower->birth_date !!}</td>
            <td>{!! $borrower->birth_place !!}</td>
            <td>{!! $borrower->facebook_url !!}</td>
            <td>{!! $borrower->field_work !!}</td>
            <td>{!! $borrower->gender !!}</td>
            <td>{!! $borrower->heir !!}</td>
            <td>{!! $borrower->heir_phone_number !!}</td>
            <td>{!! $borrower->identity_image !!}</td>
            <td>{!! $borrower->identity_number !!}</td>
            <td>{!! $borrower->instagram_twitter_url !!}</td>
            <td>{!! $borrower->last_education !!}</td>
            <td>{!! $borrower->married_status !!}</td>
            <td>{!! $borrower->name !!}</td>
            <td>{!! $borrower->npwp_image !!}</td>
            <td>{!! $borrower->npwp_number !!}</td>
            <td>{!! $borrower->phone_number !!}</td>
            <td>{!! $borrower->relation_with_heir !!}</td>
            <td>{!! $borrower->religion !!}</td>
            <td>{!! $borrower->website_url !!}</td>
            <td>{!! $borrower->work !!}</td>
            <td>{!! $borrower->user_id !!}</td>
            <td>{!! $borrower->identity_type_id !!}</td>
            <td>{!! $borrower->range_salary_id !!}</td>
            <td>{!! $borrower->sub_district_id !!}</td>
            <td>{!! $borrower->city_id !!}</td>
            <td>{!! $borrower->province_id !!}</td>
            <td>{!! $borrower->urban_village_id !!}</td>
            <td>
                {!! Form::open(['route' => ['borrowers.destroy', $borrower->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('borrowers.show', [$borrower->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('borrowers.edit', [$borrower->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>