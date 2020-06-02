@extends('adminlte::page')

@section('title', "Detalhes do plano {$plano->nome}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('planos.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('planos.show', $plano->url) }}">{{ $plano->nome }}</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('detalhes.plano.index', $plano->url) }}" class="active">Detalhes</a></li>
    </ol>
    <h1>Detalhes do plano {{ $plano->nome }} <a href="{{ route('detalhes.plano.create', $plano->url) }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            @include('admin.includes.alerts')

            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="150">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalhes as $detalhe)
                        <tr>
                            <td>
                                {{ $detalhe->nome }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('detalhes.plano.edit', [$plano->url, $detalhe->id]) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('detalhes.plano.show', [$plano->url, $detalhe->id]) }}" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $detalhes->appends($filters)->links() !!}
            @else
                {!! $detalhes->links() !!}
            @endif
        </div>
    </div>
@stop
