@extends('adminlte::page')

@section('title', "Categorias do produto {$produto->title}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('produtos.index') }}">Planos</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('produtos.categorias', $produto->id) }}" class="active">Categorias</a></li>
    </ol>

    <h1>Categorias do produto <strong>{{ $produto->titulo }}</strong></h1>
    <a href="{{ route('produtos.categorias.disponiveis', $produto->id) }}" class="btn btn-dark">ADD NOVA CATEGORIA</a>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td>
                                {{ $categoria->nome }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('produtos.categoria.detach', [$produto->id, $categoria->id]) }}" class="btn btn-danger">DESVINCULAR</a>
                            </td>
                        </tr>
                    @endforeach
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
