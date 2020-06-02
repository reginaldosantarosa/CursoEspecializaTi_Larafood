@extends('adminlte::page')

@section('title', "Adicionar novo detalhe ao plano {{$plano->nome}}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('planos.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('planos.show', $plano->url) }}">{{ $plano->nome }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('detalhes.plano.index', $plano->url) }}" class="active">Detalhes</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('detalhes.plano.create', $plano->url) }}" class="active">Novo</a></li>
    </ol>

    <h1>Adicionar novo detalhe ao plano {{ $plano->nome }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('detalhes.plano.store', $plano->url) }}" method="post">
                @include('admin.paginas.planos.detalhes._partials.form')
            </form>
        </div>
    </div>
@endsection
