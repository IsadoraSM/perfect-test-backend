@extends('layout')

@section('content')
    <h1>Dashboard de vendas</h1>

    @include('dashboard.partials.sales');

    @include('dashboard.partials.sales_result');
    
    @include('dashboard.partials.products');
@endsection
