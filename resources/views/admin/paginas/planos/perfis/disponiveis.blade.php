@extends('adminlte::page')

@section('title', 'Perfis disponíveis para o plano {$plano->nome}')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('planos.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('planos.perfis', $plano->id) }}">Perfis</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('planos.perfis.disponiveis', $plano->id) }}" class="active">Disponíveis</a></li>
    </ol>

    <h1>Perfis disponíveis para o plano <strong>{{ $plano->nome }}</strong></h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('planos.perfis.disponiveis', $plano->id) }}" method="POST" class="form form-inline">
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
                    <form action="{{ route('planos.perfis.attach', $plano->id) }}" method="POST">
                        @csrf

                        @foreach ($perfis as $perfil)
                            <tr>
                                <td>
                                    <input type="checkbox" name="perfis[]" value="{{ $perfil->id }}">
                                </td>
                                <td>
                                    {{ $perfil->nome }}
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
                {!! $perfis->appends($filters)->links() !!}
            @else
                {!! $perfis->links() !!}
            @endif
        </div>
    </div>
@stop
