@extends('adminlte::page')

@section('title', "Detalhes da produto {$empresa->nome}")

@section('content_header')
    <h1>Detalhes da Empresa <b>{{ $empresa->nome }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <img src="{{ url("storage/{$empresa->logo}") }}" alt="{{ $empresa->title }}" style="max-width: 90px;">
            <ul>
                <li>
                    <strong>Plano: </strong> {{ $empresa->plano->nome }}
                </li>
                <li>
                    <strong>Nome: </strong> {{ $empresa->nome }}
                </li>
                <li>
                    <strong>URL: </strong> {{ $empresa->url }}
                </li>
                <li>
                    <strong>E-mail: </strong> {{ $empresa->email }}
                </li>
                <li>
                    <strong>CNPJ: </strong> {{ $empresa->cnpj }}
                </li>
                <li>
                    <strong>Ativo: </strong> {{ $empresa->active == 'S' ? 'SIM' : 'NÃO' }}
                </li>
            </ul>

            <hr>
            <h3>Assinatura</h3>
            <ul>
                <li>
                    <strong>Data Assinatura: </strong> {{ $empresa->inscricao }}
                </li>
                <li>
                    <strong>Data Expira: </strong> {{ $empresa->expira_acesso }}
                </li>
                <li>
                    <strong>Identificador: </strong> {{ $empresa->inscricao_id }}
                </li>
                <li>
                    <strong>Ativo? </strong> {{ $empresa->inscricao_ativa ? 'SIM' : 'NÃO' }}
                </li>
                <li>
                    <strong>Cancelou? </strong> {{ $empresa->subscription_suspended ? 'SIM' : 'NÃO' }}
                </li>
            </ul>
        </div>
    </div>
@endsection
