@include('admin.includes.alerts')

<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="nome" class="form-control" placeholder="Nome:" value="{{ $categoria->nome ?? old('nome') }}">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <textarea name="descricao" ols="30" rows="5" class="form-control">{{ $categoria->descricao ?? old('descricao') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
