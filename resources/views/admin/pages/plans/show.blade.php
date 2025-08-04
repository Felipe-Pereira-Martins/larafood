@extends('adminlte::page')

@section('title', 'Detalhes do plano {$plan->name}')

@section('content_header')
    <!-- 
        Breadcrumb profissional com ícones.
        Mostra a navegação: Dashboard > Planos > Detalhes do plano [NOME]
        Padrão AdminLTE / Bootstrap, para fácil customização.
    -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('plans.index') }}">
                <i class="fas fa-list"></i> Planos
            </a>
        </li>
        <li class="breadcrumb-item active">
            <i class="fas fa-info-circle"></i> Detalhes do plano
            <span class="font-weight-bold ml-1">{{ $plan->name }}</span>
        </li>
    </ol>

    <!-- 
        Título principal da página de detalhes do plano.
        Ícone destacado, nome do plano em negrito, visual profissional.
    -->
    <h1 class="mb-0 mt-2">
        <i class="fas fa-info-circle text-primary mr-2"></i>
        Detalhes do plano 
        <span class="text-dark font-weight-bold">{{ $plan->name }}</span>
    </h1>
@stop


@section ('content')
    <!-- Exibe todas as informações do plano -->
   <div class="card">
    <div class="card-body">

        <ul class="list-group list-group-flush mb-4">
            <li class="list-group-item d-flex align-items-center">
                <i class="fas fa-file-signature text-primary mr-2"></i>
                <strong class="mr-2">Nome:</strong> {{ $plan->name }}
            </li>
            <li class="list-group-item d-flex align-items-center">
                <i class="fas fa-link text-secondary mr-2"></i>
                <strong class="mr-2">URL:</strong> {{ $plan->url }}
            </li>
            <li class="list-group-item d-flex align-items-center">
                <i class="fas fa-dollar-sign text-success mr-2"></i>
                <strong class="mr-2">Preço:</strong> R$ {{ number_format($plan->price, 2, ',', '.') }}
            </li>
            <li class="list-group-item d-flex align-items-center">
                <i class="fas fa-align-left text-info mr-2"></i>
                <strong class="mr-2">Descrição:</strong> {{ $plan->description }}
            </li>
        </ul>

        <div class="d-flex justify-content-between">
            <form action="{{ route('plans.delete', $plan->url) }}" method="post" onsubmit="return confirm('Tem certeza que deseja deletar este plano?');" class="mr-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i> Deletar
                </button>
            </form>
            <a href="{{ route('plans.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
        </div>

    </div>
</div>

@endsection