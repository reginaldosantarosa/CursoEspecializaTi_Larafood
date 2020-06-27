@extends('adminlte::page')

@section('title', "Detalhes do cargo {$role->nome}")

@section('content_header')
    <h1>Detalhes do cargo <b>{{ $role->nome }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $role->nome }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $role->descricao }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR O CARGO: {{ $role->nome }}</button>
            </form>
        </div>
    </div>
@endsection
