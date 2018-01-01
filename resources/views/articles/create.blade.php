@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Article
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    <!-- todo : please add new field html for select image from local computer and upload it into server. Save file name into table article -> image_name. -->
                    <!-- todo : use id "image_name" for the new field html-->
                    {!! Form::open(['route' => 'articles.store']) !!}

                        @include('articles.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
