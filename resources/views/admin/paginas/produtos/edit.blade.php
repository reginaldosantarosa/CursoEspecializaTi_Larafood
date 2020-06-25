@extends('adminlte::page')

@section('title', "Editar o produto {$produto->titulo}")

@section('content_header')
    <h1>Editar o produto {{ $produto->titulo }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('produtos.update', $produto->id) }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.paginas.produtos._partials.form')
            </form>
        </div>
    </div>
@endsection
