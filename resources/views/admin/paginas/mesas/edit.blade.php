@extends('adminlte::page')

@section('title', "Editar a mesa {$mesa->identificacao}")

@section('content_header')
    <h1>Editar a mesa {{ $mesa->identificacao }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('mesas.update', $mesa->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')
                @include('admin.paginas.mesas._partials.form')
            </form>
        </div>
    </div>
@endsection
