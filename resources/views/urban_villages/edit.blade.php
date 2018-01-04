@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Urban Village
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($urbanVillage, ['route' => ['urbanVillages.update', $urbanVillage->id], 'method' => 'patch']) !!}

                        @include('urban_villages.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection