@include('admin.includes.alerts')

<div class="form-group">
    <label>Identificador da Mesa:</label>
    <input type="text" name="identificacao" class="form-control" placeholder="Identificador da Mesa:" value="{{ $mesa->identificacao ?? old('identificacao') }}">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <textarea name="descricao" ols="30" rows="5" class="form-control">{{ $mesa->descricao ?? old('descricao') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
