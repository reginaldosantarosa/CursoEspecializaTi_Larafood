@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('empresas.index') }}" class="active">Empresas</a></li>
    </ol>

    <h1>Empresas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('empresas.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtrar:" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="100">Imagem</th>
                        <th>Nome</th>
                        <th width="150">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empresas as $empresa)
                        <tr>
                            <td>
                                <img src="{{ url("storage/{$empresa->logo}") }}" alt="{{ $empresa->titulo }}" style="max-width: 90px;">
                            </td>
                            <td>{{ $empresa->nome }}</td>
                            <td style="width=10px;">
                                <a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('empresas.show', $empresa->id) }}" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $empresas->appends($filters)->links() !!}
            @else
                {!! $empresas->links() !!}
            @endif
        </div>
    </div>
@stop
