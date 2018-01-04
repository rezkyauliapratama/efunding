@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Borrower
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($borrower, ['route' => ['borrowers.update', $borrower->id], 'method' => 'patch']) !!}

                        @include('borrowers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection