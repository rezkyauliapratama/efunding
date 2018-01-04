@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sub District
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($subDistrict, ['route' => ['subDistricts.update', $subDistrict->id], 'method' => 'patch']) !!}

                        @include('sub_districts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection