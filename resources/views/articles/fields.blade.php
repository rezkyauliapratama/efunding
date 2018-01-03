<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Post Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('post_date', 'Post Date:') !!}
    {!! Form::date('post_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Body Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<!-- Post Image -->
<div class="form-group col-sm-12">
    {!! Form::label('image_name', 'Image:') !!}
    {!! Form::file('image_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Post Type Field -->
<div class="form-group col-sm-12">
    {!! Form::label('post_type', 'Post Type:') !!}
    <label class="radio-inline">
        {!! Form::radio('post_type', "Public", null) !!} Public
    </label>

    <label class="radio-inline">
        {!! Form::radio('post_type', "Private", null) !!} Private
    </label>

</div>

<!-- Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category', 'Category:') !!}
    {!! Form::select('category', ['Technology' => 'Technology', 'LifeStyle' => 'LifeStyle', 'Education' => 'Education', 'Games' => 'Games'], null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', Auth::user()->id, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('articles.index') !!}" class="btn btn-default">Cancel</a>
</div>
