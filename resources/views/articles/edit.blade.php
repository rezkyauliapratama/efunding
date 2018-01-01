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
                   <!--
                                   $article have key :
                                   id
                                   title
                                   post_date
                                   body
                                   post_type
                                   category
                                   user_id
                                   image_name
                                   created_at
                                   updated _at
                                   deleted_at
                   -->

                   <!-- todo : please add new field html for select image from local computer and upload it into server. Save file name into table article -> image_name. -->
                   <!-- todo : get the image from server and show it on the edit field -->
                   {!! Form::model($article, ['route' => ['articles.update', $article->id], 'method' => 'patch']) !!}

                        @include('articles.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection