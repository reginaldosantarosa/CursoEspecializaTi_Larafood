@extends('adminlte::page')

@section('title', "Detalhes da categoria {$categoria->nome}")

@section('content_header')
    <h1>Detalhes da categoria <b>{{ $categoria->nome }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $categoria->nome }}
                </li>
                <li>
                    <strong>URL: </strong> {{ $categoria->url }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $categoria->descricao }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR A CATEGORIA {{ $categoria->name }}</button>
            </form>
        </div>
    </div>
@endsection
