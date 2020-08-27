<h5>Informações do cliente</h5>
<div class="form-group">
    <label for="client_name">Nome</label>
    <input type="text" class="form-control @if($errors->has('client_name')) is-invalid @endif" id="client_name" 
            name="client_name" value="{{old('client_name')}}">
    @if($errors->has('client_name'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('client_name') }}</strong>
        </div>
    @endif
</div>
<div class="form-group">
    <label for="client_email">Email</label>
    <input type="text" class="form-control @if($errors->has('client_email')) is-invalid @endif" id="client_email" 
            name="client_email" value="{{old('client_email')}}">
    @if($errors->has('client_email'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('client_email') }}</strong>
        </div>
    @endif
</div>
<div class="form-group">
    <label for="client_cpf">CPF</label>
    <input type="text" class="form-control @if($errors->has('client_cpf')) is-invalid @endif" id="client_cpf" 
            name="client_cpf" placeholder="99999999999" value="{{old('client_cpf')}}">
    @if($errors->has('client_cpf'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('client_cpf') }}</strong>
        </div>
    @endif
</div>
<h5 class='mt-5'>Informações da venda</h5>
<div class="form-group">
    <label for="product_id">Produto</label>
    <select id="product_id" name="product_id" class="form-control  @if($errors->has('product_id')) is-invalid @endif">
        <option value='' selected>Escolha...</option>
        @foreach($products as $product)
            <option value="{{$product->id}}" {{ (old("product_id") == $product->id ? "selected":"") }} >{{$product->name}}</option>
        @endforeach
    </select>
    @if($errors->has('product_id'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('product_id') }}</strong>
        </div>
    @endif
</div>
<div class="form-group">
    <label for="date">Data</label>
    <input type="text" class="form-control single_date_picker @if($errors->has('date')) is-invalid @endif" id="date" 
            name="date" value="{{old('date')}}">
    @if($errors->has('date'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('date') }}</strong>
        </div>
    @endif
</div>
<div class="form-group">
    <label for="hour">Hora</label>
    <input type="time" class="form-control @if($errors->has('hour')) is-invalid @endif" id="hour" 
            name="hour"  value="{{old('hour')}}">
    @if($errors->has('hour'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('hour') }}</strong>
        </div>
    @endif
</div>
<div class="form-group">
    <label for="quantity">Quantidade</label>
    <input type="number" class="form-control @if($errors->has('quantity')) is-invalid @endif" id="quantity" 
            name="quantity" placeholder="1 a 10"  value="{{old('quantity')}}">
    @if($errors->has('quantity'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('quantity') }}</strong>
        </div>
    @endif
</div>
<div class="form-group">
    <label for="discount">Desconto</label>
    <input type="text" class="form-control  @if($errors->has('discount')) is-invalid @endif" id="discount" 
            name="discount" placeholder="100,00 ou menor" value="{{old('discount')}}">
    @if($errors->has('discount'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('discount') }}</strong>
        </div>
    @endif
</div>
<div class="form-group">
    <label for="status">Status</label>
    <select id="status" name="status" class="form-control  @if($errors->has('status')) is-invalid @endif">
        <option value='' selected>Escolha...</option>
        <option value="1" {{ (old("status") == '1' ? "selected":"") }}>Aprovado</option>
        <option value="2" {{ (old("status") == '2' ? "selected":"") }}>Cancelado</option>
        <option value="3" {{ (old("status") == '3' ? "selected":"") }}>Devolvido</option>
    </select>
    @if($errors->has('status'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('status') }}</strong>
        </div>
    @endif
</div>

<button type="submit" class="btn btn-primary">Salvar</button>
