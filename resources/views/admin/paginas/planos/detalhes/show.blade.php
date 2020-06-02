@extends('adminlte::page')
@section('title', "Detalhes do detalhe {$detalhe->nome}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('planos.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('planos.show', $plano->url) }}">{{ $plano->nome }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('detalhes.plano.index', $plano->url) }}" class="active">Detalhes</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('detalhes.plano.edit', [$plano->url, $detalhe->id]) }}" class="active">Detalhes</a></li>
    </ol>
    <h1>Detalhes do detalhe {{ $detalhe->nome }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome:</strong> {{ $detalhe->nome }}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{ route('detalhes.plano.destroy', [$plano->url, $detalhe->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar o Detalhe {{ $detalhe->nome }}, do plano {{ $plano->nome }}</button>
            </form>
        </div>
    </div>
@endsection
