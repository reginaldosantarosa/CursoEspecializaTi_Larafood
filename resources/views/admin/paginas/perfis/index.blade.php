@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('perfis.index') }}" class="active">Perfis</a></li>
    </ol>

    <h1>Perfis <a href="{{ route('perfis.create') }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('perfis.search') }}" method="POST" class="form form-inline">
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
                        <th width="270">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($perfis as $perfil)
                        <tr>
                            <td>
                                {{ $perfil->nome }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('perfis.edit', $perfil->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('perfis.show', $perfil->id) }}" class="btn btn-warning">VER</a>
                                {{--<a href="{{ route('perfis.permissions', $perfil->id) }}" class="btn btn-warning"><i class="fas fa-lock"></i></a> --}}
                                {{--<a href="{{ route('perfis.planos', $perfil->id) }}" class="btn btn-info"><i class="fas fa-list-alt"></i></a> --}}
                            </td>
                        </tr>
                    @endforeach
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
