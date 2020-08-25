@extends('layout')

@section('content')
    <h1>Adicionar / Editar Produto</h1>
    <div class='card'>
        <div class='card-body'>
            <form action="{{route($actionRoute)}}" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Nome do produto</label>
                    <input type="text" class="form-control @if($errors->has('name')) is-invalid @endif" id="name" value="{{old('name')}}" name="name">
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea type="text" rows='5' class="form-control @if($errors->has('description')) is-invalid @endif " id="description" name="description">{{old('description')}}</textarea>
                    @if($errors->has('description'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('description') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="price">Preço</label>
                    <input type="text" class="form-control @if($errors->has('price')) is-invalid @endif" id="price" placeholder="100,00 ou maior" value="{{old('price')}}" name="price">
                    @if($errors->has('price'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('price') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="image">Imagem do produto</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>
                    </div>
                    <div class="col-4">
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Salvar</button>

            </form>
        </div>
    </div>
@endsection
