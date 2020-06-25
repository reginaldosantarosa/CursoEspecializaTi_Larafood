@extends('adminlte::page')

@section('titulo', 'Categorias disponíveis para o produto {$produto->titulo}')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('produtos.index') }}">Produtos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('produtos.categorias', $produto->id) }}">Categorias</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('produtos.categorias.disponiveis', $produto->id) }}" class="active">Disponíveis</a></li>
    </ol>

    <h1>Categorias disponíveis para o produto <strong>{{ $produto->titulo }}</strong></h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('produtos.categorias.disponiveis', $produto->id) }}" method="POST" class="form form-inline">
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
                    <form action="{{ route('produtos.categorias.attach', $produto->id) }}" method="POST">
                        @csrf

                        @foreach ($categorias as $categoria)
                            <tr>
                                <td>
                                    <input type="checkbox" name="categorias[]" value="{{ $categoria->id }}">
                                </td>
                                <td>
                                    {{ $categoria->nome }}
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
                {!! $categorias->appends($filters)->links() !!}
            @else
                {!! $categorias->links() !!}
            @endif
        </div>
    </div>
@stop
