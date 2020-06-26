@extends('adminlte::page')

@section('title', "Detalhes da mesa {$mesa->identificacao}")

@section('content_header')
    <h1>Detalhes da mesa <b>{{ $mesa->identificacao }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Identificador da mesa: </strong> {{ $mesa->identificacao }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $mesa->descricao }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('mesas.destroy', $mesa->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR A MESA {{ $mesa->identificacao }}</button>
            </form>
        </div>
    </div>
@endsection
