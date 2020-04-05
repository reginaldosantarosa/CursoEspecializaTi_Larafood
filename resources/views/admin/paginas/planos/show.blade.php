@extends('adminlte::page')

@section('title', "Detalhes do plano {$plano->nome}")

@section('content_header')
    <h1>Detalhes do plano <b>{{ $plano->nome }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $plano->nome }}
                </li>
                <li>
                    <strong>URL: </strong> {{ $plano->url }}
                </li>
                <li>
                    <strong>Preço: </strong> R$ {{ number_format($plano->preco, 2, ',', '.') }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $plano->descricao }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('planos.destroy', $plano->url) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR O PLANO {{ $plano->nome }}</button>
            </form>
        </div>
    </div>
@endsection
