@extends('adminlte::page')

@section('title', "Editar o Perfil {$perfil->nome}")

@section('content_header')
    <h1>Editar o Perfil {{ $perfil->nome }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('perfis.update', $perfil->id) }}" class="form" method="POST">
                @method('PUT')
                @include('admin.paginas.perfis._partials.form')
            </form>
        </div>
    </div>
@endsection
