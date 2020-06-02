@extends('adminlte::page')

@section('title', "Detalhes da permissão {$permissao->nome}")

@section('content_header')
    <h1>Detalhes da permissão <b>{{ $permissao->nome }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $permissao->nome }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $permissao->descricao }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('permissoes.destroy', $permissao->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR O PERFIL: {{ $permissao->nome }}</button>
            </form>
        </div>
    </div>
@endsection
