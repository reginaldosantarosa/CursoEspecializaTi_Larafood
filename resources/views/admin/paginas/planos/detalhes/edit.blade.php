@extends('adminlte::page')

@section('title', "Editar o detalhe {$detalhe->nome}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('planos.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('planos.show', $plano->url) }}">{{ $plano->name }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('detalhes.plano.index', $plano->url) }}" class="active">Detalhes</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('detalhes.plano.edit', [$plano->url, $detalhe->id]) }}" class="active">Editar</a></li>
    </ol>

    <h1>Editar o detalhe {{ $detalhe->nome }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('detalhes.plano.update', [$plano->url, $detalhe->id]) }}" method="post">
                @method('PUT')
                @include('admin.paginas.planos.detalhes._partials.form')
            </form>
        </div>
    </div>
@endsection
