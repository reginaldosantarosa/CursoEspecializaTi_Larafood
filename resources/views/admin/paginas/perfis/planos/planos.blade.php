@extends('adminlte::page')

@section('title', "Planos do perfil {$perfil->nome}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('perfis.index') }}">Perfis</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('perfis.planos', $perfil->id) }}" class="active">Planos</a></li>
    </ol>

    <h1>Planos do perfil <strong>{{ $perfil->nome }}</strong></h1>

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
                    @foreach ($planos as $plano)
                        <tr>
                            <td>
                                {{ $plano->nome }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('planos.perfis.detach', [$plano->id, $perfil->id]) }}" class="btn btn-danger">DESVINCULAR</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $planos->appends($filters)->links() !!}
            @else
                {!! $planos->links() !!}
            @endif
        </div>
    </div>
@stop
