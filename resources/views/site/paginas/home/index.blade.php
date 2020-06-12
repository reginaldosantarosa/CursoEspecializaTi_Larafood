@extends('site.layouts.app')

@section('content')
<div class="text-center">
    <h1 class="title-plan">Escolha o plano</h1>
</div>
<div class="row">
    @foreach ($planos as $plano)
        <div class="col-md-4 col-sm-6">
            <div class="pricingTable">
                <div class="pricing-content">
                    <div class="pricingTable-header">
                        <h3 class="title">{{ $plano->nome }}</h3>
                    </div>
                    <div class="inner-content">
                        <div class="price-value">
                            <span class="currency">R$</span>
                            <span class="amount">{{ number_format($plano->preco, 2, ',', '.') }}</span>
                            <span class="duration">Por Mês</span>
                        </div>
                        <ul>
                            @foreach ($plano->detalhes as $detalhe)
                                <li>{{ $detalhe->nome }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="pricingTable-signup">
                   <a href="{{ route('plano.inscricao', $plano->url)}}">Assinar</a>
                </div>
            </div>
        </div><!--end-->
    @endforeach
</div>
@endsection
