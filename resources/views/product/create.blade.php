@extends('layout')

@section('content')
    <h1>Adicionar Produto</h1>
    <div class='card'>
        <div class='card-body'>
            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}

                @include('product.partials.form')
                
            </form>
        </div>
    </div>
@endsection