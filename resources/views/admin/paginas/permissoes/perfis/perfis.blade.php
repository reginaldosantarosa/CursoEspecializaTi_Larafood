@extends('adminlte::page')

@section('title', "Perfis da permissão {$permissao->nome}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('perfis.index') }}" class="active">Perfis</a></li>
    </ol>

    <h1>Perfis da permissão: <strong>{{ $permissao->nome }}</strong></h1>

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
                    @foreach ($perfis as $perfil)
                        <tr>
                            <td>
                                {{ $perfil->nome }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('perfis.permirssoes.detach', [$profile->id, $permissao->id]) }}" class="btn btn-danger">DESVINCULAR</a>
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
