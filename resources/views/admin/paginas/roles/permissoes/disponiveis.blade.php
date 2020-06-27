@extends('adminlte::page')

@section('title', "Permissões disponíveis cargo {$role->nome}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('roles.index') }}" class="active">Cargos</a></li>
    </ol>

    <h1>Permissões disponíveis cargo <strong>{{ $role->nome }}</strong></h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('roles.permissoes.disponiveis', $role->id) }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="50px">#</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('roles.permissoes.attach', $role->id) }}" method="POST">
                        @csrf

                        @foreach ($permissoes as $permissao)
                            <tr>
                                <td>
                                    <input type="checkbox" name="permissoes[]" value="{{ $permissao->id }}">
                                </td>
                                <td>
                                    {{ $permissao->nome }}
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="500">
                                @include('admin.includes.alerts')

                                <button type="submit" class="btn btn-success">Vincular</button>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $permissoes->appends($filters)->links() !!}
            @else
                {!! $permissoes->links() !!}
            @endif
        </div>
    </div>
@stop
