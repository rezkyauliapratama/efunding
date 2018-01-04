<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Sub District Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sub_district_id', 'Sub District Id:') !!}
    {!! Form::text('sub_district_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('urbanVillages.index') !!}" class="btn btn-default">Cancel</a>
</div>
