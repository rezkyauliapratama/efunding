@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Type Transaction
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($typeTransaction, ['route' => ['typeTransactions.update', $typeTransaction->id], 'method' => 'patch']) !!}

                        @include('type_transactions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection