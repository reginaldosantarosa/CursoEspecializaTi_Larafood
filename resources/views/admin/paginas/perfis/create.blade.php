@extends('adminlte::page')

@section('title', 'Cadastrar Novo Perfil')

@section('content_header')
    <h1>Cadastrar Novo Perfil</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('perfis.store') }}" class="form" method="POST">
                @include('admin.paginas.perfis._partials.form')
            </form>
        </div>
    </div>
@endsection
