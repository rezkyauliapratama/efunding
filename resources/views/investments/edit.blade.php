@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Investment
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($investment, ['route' => ['investments.update', $investment->id], 'method' => 'patch']) !!}

                        @include('investments.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection