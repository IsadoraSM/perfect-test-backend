@extends('layout')

@section('content')
    <h1>Editar Produto </h1>
    <div class='card'>
        <div class='card-body'>
            <form action="{{route('product.update', ['uuid' => $product->uuid])}}" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}

                @include('product.partials.form')
                
            </form>
        </div>
    </div>
    <script src="{{ asset('js/product.js') }}"></script>
@endsection