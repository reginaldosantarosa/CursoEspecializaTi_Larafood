@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('mesas.index') }}" class="active">Mesas</a></li>
    </ol>

    <h1>Mesas <a href="{{ route('mesas.create') }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('mesas.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtrar:" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Identify</th>
                        <th>Descrição</th>
                        <th width="190">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mesas as $mesa)
                        <tr>
                            <td>{{ $mesa->identificacao }}</td>
                            <td>{{ $mesa->descricao }}</td>
                            <td style="width=30px;">
                                <a href="{{ route('mesas.qrcode', $mesa->identificacao) }}" class="btn btn-default" target="_blank">
                                    <i class="fas fa-qrcode"></i>
                                </a>
                                <a href="{{ route('mesas.edit', $mesa->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('mesas.show', $mesa->id) }}" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $mesas->appends($filters)->links() !!}
            @else
                {!! $mesas->links() !!}
            @endif
        </div>
    </div>
@stop
