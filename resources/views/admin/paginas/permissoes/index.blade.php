@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('permissoes.index') }}" class="active">Permissões</a></li>
    </ol>

    <h1>Permissões <a href="{{ route('permissoes.create') }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('permissoes.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="250">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissoes as $permissao)
                        <tr>
                            <td>
                                {{ $permissao->nome }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('permissoes.edit', $permissao->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('permissoes.show', $permissao->id) }}" class="btn btn-warning">VER</a>
                                {{--<a href="{{ route('permissoes.profiles', $permissao->id) }}" class="btn btn-info"><i class="fas fa-address-book"></i></a>--}}
                            </td>
                        </tr>
                    @endforeach
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
