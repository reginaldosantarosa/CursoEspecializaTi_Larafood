 @extends('adminlte::page')

@section('title', "Permissões do perfil {$perfil->nome}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('perfis.index') }}" class="active">Perfis</a></li>
    </ol>

    <h1>Permissões do perfil <strong>{{ $perfil->nome }}</strong></h1>
   <a href="{{ route('perfis.permissoes.disponiveis', $perfil->id) }}" class="btn btn-dark">ADD NOVA PERMISSÃO</a>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissoes as $permissao)
                        <tr>
                            <td>
                                {{ $permissao->nome }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('perfis.permissoes.detach', [$perfil->id, $permissao->id]) }}" class="btn btn-danger">DESVINCULAR</a
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $permissoes->appends($filters)->links() !!}
            @else
                {!! $permissoes->links() !!}
            @endif
        </div>
    </div>
@stop
