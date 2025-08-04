@extends('adminlte::page')

@section('title', "Editar o plano {$plan->name}")

@section('content_header')
    <h1>Editar o plano {{$plan->name}}</h1>
@stop

@section ('content')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.update', $plan->url) }}" class="form" method="post">
                <!-- Segurança no laravel -->   
                @csrf 
                @method('PUT') <!-- PUT = Update = Editar um registro já existente. -->
                @include ('admin.pages.plans._partials.form')
            </form>
        </div>
    </div>

@endsection