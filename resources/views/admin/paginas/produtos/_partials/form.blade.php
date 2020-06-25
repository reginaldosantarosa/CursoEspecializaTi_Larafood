@include('admin.includes.alerts')

<div class="form-group">
    <label>* Título:</label>
    <input type="text" name="titulo" class="form-control" placeholder="Título:" value="{{ $produto->titulo ?? old('titulo') }}">
</div>
<div class="form-group">
    <label>* Preço:</label>
    <input type="text" name="preco" class="form-control" placeholder="Preço:" value="{{ $produto->preco ?? old('preco') }}">
</div>
<div class="form-group">
    <label>* Imagem:</label>
    <input type="file" name="imagem" class="form-control">
</div>
<div class="form-group">
    <label>* Descrição:</label>
    <textarea name="descricao" ols="30" rows="5" class="form-control">{{ $produto->descricao ?? old('descricao') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
