@extends('adminlte::page')

@section('title', "Editar a categoria {$categoria->nome}")

@section('content_header')
    <h1>Editar a categoria {{ $categoria->nome }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('categorias.update', $categoria->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.paginas.categorias._partials.form')
            </form>
        </div>
    </div>
@endsection
