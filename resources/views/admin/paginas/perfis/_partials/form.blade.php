@include('admin.includes.alerts')

@csrf

<div class="form-group">
    <label>* Nome:</label>
    <input type="text" name="nome" class="form-control" placeholder="Nome:" value="{{ $perfil->nome ?? old('nome') }}">
</div>
<div class="form-group">
    <label>Descrição:</label>
<input type="text" name="descricao" class="form-control" placeholder="Descrição:" value="{{ $perfil->descricao ?? old('descricao') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
