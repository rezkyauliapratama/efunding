<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Birth Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birth_date', 'Birth Date:') !!}
    {!! Form::date('birth_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Birth Place Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birth_place', 'Birth Place:') !!}
    {!! Form::text('birth_place', null, ['class' => 'form-control']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-12">
    {!! Form::label('gender', 'Gender:') !!}
    <label class="radio-inline">
        {!! Form::radio('gender', "Laki-Laki", null) !!} Laki-Laki
    </label>

    <label class="radio-inline">
        {!! Form::radio('gender', "Perempuan", null) !!} Perempuan
    </label>

</div>

<!-- Last Education Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_education', 'Last Education:') !!}
    {!! Form::select('last_education', ['SD' => 'SD', 'SMP' => 'SMP', 'SMA' => 'SMA', 'D1' => 'D1', 'D2' => 'D2', 'D3' => 'D3', 'S1' => 'S1', 'S2' => 'S2', 'S3' => 'S3'], null, ['class' => 'form-control']) !!}
</div>

<!-- Married Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('married_status', 'Married Status:') !!}
    {!! Form::text('married_status', null, ['class' => 'form-control']) !!}
</div>

<!-- Religion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('religion', 'Religion:') !!}
    {!! Form::text('religion', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Facebook Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facebook_url', 'Facebook Url:') !!}
    {!! Form::text('facebook_url', null, ['class' => 'form-control']) !!}
</div>

<!-- Instagram Twitter Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('instagram_twitter_url', 'Instagram Twitter Url:') !!}
    {!! Form::text('instagram_twitter_url', null, ['class' => 'form-control']) !!}
</div>

<!-- Website Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('website_url', 'Website Url:') !!}
    {!! Form::text('website_url', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Identity Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('identity_number', 'Identity Number:') !!}
    {!! Form::text('identity_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Identity Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('identity_image', 'Identity Image:') !!}
    {!! Form::text('identity_image', null, ['class' => 'form-control']) !!}
</div>

<!-- Npwp Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('npwp_number', 'Npwp Number:') !!}
    {!! Form::text('npwp_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Npwp Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('npwp_image', 'Npwp Image:') !!}
    {!! Form::text('npwp_image', null, ['class' => 'form-control']) !!}
</div>

<!-- Work Field -->
<div class="form-group col-sm-6">
    {!! Form::label('work', 'Work:') !!}
    {!! Form::text('work', null, ['class' => 'form-control']) !!}
</div>

<!-- Field Work Field -->
<div class="form-group col-sm-6">
    {!! Form::label('field_work', 'Field Work:') !!}
    {!! Form::text('field_work', null, ['class' => 'form-control']) !!}
</div>

<!-- Heir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('heir', 'Heir:') !!}
    {!! Form::text('heir', null, ['class' => 'form-control']) !!}
</div>

<!-- Heir Phone Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('heir_phone_number', 'Heir Phone Number:') !!}
    {!! Form::text('heir_phone_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Relation With Heir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('relation_with_heir', 'Relation With Heir:') !!}
    {!! Form::text('relation_with_heir', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Identity Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('identity_type_id', 'Identity Type Id:') !!}
    {!! Form::text('identity_type_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Range Salary Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('range_salary_id', 'Range Salary Id:') !!}
    {!! Form::text('range_salary_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Province Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('province_id', 'Province Id:') !!}
    {!! Form::text('province_id', null, ['class' => 'form-control']) !!}
</div>

<!-- City Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city_id', 'City Id:') !!}
    {!! Form::text('city_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Sub District Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sub_district_id', 'Sub District Id:') !!}
    {!! Form::text('sub_district_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Urban Village Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('urban_village_id', 'Urban Village Id:') !!}
    {!! Form::text('urban_village_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('lends.index') !!}" class="btn btn-default">Cancel</a>
</div>
