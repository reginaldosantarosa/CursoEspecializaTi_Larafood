@extends('adminlte::page')

@section('title', "Editar a empresa {$empresa->nome}")

@section('content_header')
    <h1>Editar a empresa {{ $empresa->nome }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('empresas.update', $empresa->id) }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.paginas.empresas._partials.form')
            </form>
        </div>
    </div>
@endsection
