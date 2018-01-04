@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Range Salary
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($rangeSalary, ['route' => ['rangeSalaries.update', $rangeSalary->id], 'method' => 'patch']) !!}

                        @include('range_salaries.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection