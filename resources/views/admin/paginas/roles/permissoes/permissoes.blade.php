@extends('adminlte::page')

@section('title', "Permissões do cargo {$role->nome}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('roles.index') }}" class="active">Cargo</a></li>
    </ol>

    <h1>Permissões do cargo <strong>{{ $role->nome }}</strong></h1>

    <a href="{{ route('roles.permissoes.disponiveis', $role->id) }}" class="btn btn-dark">ADD NOVA PERMISSÃO</a>

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
                    @foreach ($permissoes as $permissao)
                        <tr>
                            <td>
                                {{ $permissao->nome }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('roles.permissoes.detach', [$role->id, $permissao->id]) }}" class="btn btn-danger">DESVINCULAR</a>
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
