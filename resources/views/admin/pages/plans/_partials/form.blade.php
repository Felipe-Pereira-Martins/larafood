@include('admin.includes.alerts')
<!-- Campo Nome -->
<div class="form-group">
    <label>
        <i class="fas fa-file-signature text-primary mr-1"></i>
        Nome
    </label>
    <input
        type="text"
        name="name"
        class="form-control"
        placeholder="Nome: "
        value="{{ $plan->name ?? old('name') }}"> <!-- Ao dar erro ao enviar o formulario, o campo nome preenchido retorna com o vlor digitado -->
</div>

<!-- Campo Preço -->
<div class="form-group">
    <label>
        <i class="fas fa-dollar-sign text-success mr-1"></i>
        Preço
    </label>
    <input
        type="text"
        name="price"
        class="form-control"
        placeholder="Preço: "
        value="{{ $plan->price ?? old('price' )}}">
</div>

<!-- Campo Descrição -->
<div class="form-group">
    <label>
        <i class="fas fa-align-left text-info mr-1"></i>
        Descrição
    </label>
    <input
        type="text"
        name="description"
        class="form-control"
        placeholder="Descrição: "
        value="{{ $plan->description ?? old('description')}}">
</div>

<!-- Campo Botão -->
<div class="form-group text-right">
    <button type="submit" class="btn btn-dark btn-sm">
        <i class="fas fa-save mr-1"></i>
        Enviar
    </button>
    <a href="{{ route('plans.index') }}" class="btn btn-dark btn-sm">
        <i class="fas fa-arrow-left"></i> Voltar
    </a>
</div>
