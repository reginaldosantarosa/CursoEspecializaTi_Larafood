@include('admin.includes.alerts')

<div class="form-group">
    <label>* Nome:</label>
    <input type="text" name="nome" class="form-control" placeholder="Nome:" value="{{ $empresa->nome ?? old('nome') }}">
</div>
<div class="form-group">
    <label>Logo:</label>
    <input type="file" name="logo" class="form-control">
</div>
<div class="form-group">
    <label>* E-mail:</label>
    <input type="email" name="email" class="form-control" placeholder="E-mail:" value="{{ $empresa->email ?? old('email') }}">
</div>
<div class="form-group">
    <label>* CNPJ:</label>
    <input type="number" name="cnpj" class="form-control" placeholder="CNPJ:" value="{{ $empresa->cnpj ?? old('cnpj') }}">
</div>
<div class="form-group">
    <label>* Ativo?</label>
    <select name="ativo" class="form-control">
        <option value="S" @if(isset($empresa) && $empresa->ativo == 'S') selected @endif >SIM</option>
        <option value="N" @if(isset($empresa) && $empresa->ativo == 'N') selected @endif>NÃO</option>
    </select>
</div>
<hr>
<h3>Assinatura</h3>
<div class="form-group">
    <label>Data Assinatura (início):</label>
    <input type="date" name="inscricao" class="form-control" placeholder="Data Assinatura (início):" value="{{ $empresa->inscricao ?? old('inscricao') }}">
</div>
<div class="form-group">
    <label>Expira (final):</label>
    <input type="date" name="expira_acesso" class="form-control" placeholder="Expira:" value="{{ $empresa->expira_acesso ?? old('expira_acesso') }}">
</div>
<div class="form-group">
    <label>Identificador:</label>
    <input type="text" name="inscricao_id" class="form-control" placeholder="Identificador:" value="{{ $empresa->inscricao_id ?? old('inscricao_id') }}">
</div>
<div class="form-group">
    <label>* Assinatura Ativa?</label>
    <select name="inscricao_ativa" class="form-control">
        <option value="1" @if(isset($empresa) && $empresa->inscricao_ativa) selected @endif >SIM</option>
        <option value="0" @if(isset($empresa) && !$empresa->inscricao_ativa) selected @endif>NÃO</option>
    </select>
</div>
<div class="form-group">
    <label>* Assinatura Cancelada?</label>
    <select name="inscricao_suspensa" class="form-control">
        <option value="1" @if(isset($empresa) && $empresa->inscricao_suspensa) selected @endif >SIM</option>
        <option value="0" @if(isset($empresa) && !$empresa->inscricao_suspensa) selected @endif>NÃO</option>
    </select>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
