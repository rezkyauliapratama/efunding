@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Lend
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($lend, ['route' => ['lends.update', $lend->id], 'method' => 'patch']) !!}

                        @include('lends.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection