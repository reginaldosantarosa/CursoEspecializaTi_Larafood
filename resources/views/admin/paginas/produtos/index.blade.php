@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('produtos.index') }}" class="active">Produtos</a></li>
    </ol>

    <h1>Produtos <a href="{{ route('produtos.create') }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('produtos.search') }}" method="POST" class="form form-inline">
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
                        <th>Título</th>
                        <th width="190">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td>
                                <img src="{{ url("storage/{$produto->imagem}") }}"  style="max-width: 90px;">
                            </td>
                            <td>{{ $produto->titulo }}</td>
                            <td style="width=10px;">
                                <a href="{{ route('produtos.categorias', $produto->id)}}" class="btn btn-warning" title="Categorias"><i class="fas fa-layer-group"></i></a>
                                <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('produtos.show', $produto->id) }}" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $produtos->appends($filters)->links() !!}
            @else
                {!! $produtos->links() !!}
            @endif
        </div>
    </div>
@stop
