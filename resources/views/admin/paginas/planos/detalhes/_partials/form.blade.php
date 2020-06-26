@include('admin.includes.alerts')
@csrf
<div class="form-group">
    <label>Nome:</label>
<input type="text" name="nome" placeholder="Nome" class="form-control" value="{{ $detalhe->nome ?? old('nome') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-info">Enviar</button>
</div>
