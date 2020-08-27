@extends('layout')

@section('content')
    <h1>Adicionar Venda</h1>
    <div class='card'>
        <div class='card-body'>
            <form action="{{route('sale.store')}}" method="POST">

                {{ csrf_field() }}

                @include('sale.partials.form')
            </form>
        </div>
    </div>
@endsection
