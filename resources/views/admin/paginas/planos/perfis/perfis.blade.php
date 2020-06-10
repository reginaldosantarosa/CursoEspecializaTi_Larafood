@extends('adminlte::page')

@section('title', "Perfis do plano {$plano->nome}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('planos.index') }}">Planos</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('planos.perfis', $plano->id) }}" class="active">Perfis</a></li>
    </ol>

    <h1>Perfis do plano <strong>{{ $plano->nome }}</strong></h1>

    <a href="{{ route('planos.perfis.disponiveis', $plano->id) }}" class="btn btn-dark">ADD NOVO PERFIL</a>

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
                                <a href="{{ route('planos.perfis.detach', [$plano->id, $perfil->id]) }}" class="btn btn-danger">DESVINCULAR</a>
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
