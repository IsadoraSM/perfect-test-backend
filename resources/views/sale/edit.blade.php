@extends('layout')

@section('content')
    <h1>Editar Venda</h1>
    <div class='card'>
        <div class='card-body'>
            <form action="{{route('sale.update', ['uuid' => $sale->uuid])}}" method="POST">

                {{ csrf_field() }}

                @include('sale.partials.form')
            </form>
        </div>
    </div>
@endsection
