@extends('adminlte::page')

@section('title', "Editar a Permissão {$permissao->nome}")

@section('content_header')
    <h1>Editar a Permissão {{ $permissao->nome }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissoes.update', $permissao->id) }}" class="form" method="POST">
                @method('PUT')

                @include('admin.paginas.permissoes._partials.form')
            </form>
        </div>
    </div>
@endsection
