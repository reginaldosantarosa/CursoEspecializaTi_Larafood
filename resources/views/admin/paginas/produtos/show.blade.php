@extends('adminlte::page')

@section('title', "Detalhes da produto {$produto->nome}")

@section('content_header')
    <h1>Detalhes da produto <b>{{ $produto->nome }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <img src="{{ url("storage/{$produto->imagem}") }}" alt="{{ $produto->titulo }}" style="max-width: 90px;">
            <ul>
                <li>
                    <strong>Título: </strong> {{ $produto->titulo }}
                </li>
                <li>
                    <strong>Flag: </strong> {{ $produto->flag }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $produto->descricao }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR o PRODUTO {{ $produto->titulo }}</button>
            </form>
        </div>
    </div>
@endsection
