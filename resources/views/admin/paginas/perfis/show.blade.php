@extends('adminlte::page')

@section('title', "Detalhes do perfil {$perfil->nome}")

@section('content_header')
    <h1>Detalhes do perfil <b>{{ $perfil->nome }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $perfil->nome }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $perfil->descricao }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('perfis.destroy', $perfil->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR O PERFIL: {{ $perfil->nome }}</button>
            </form>
        </div>
    </div>
@endsection
