@extends('layout')

@section('content')
    <h1>Dashboard de vendas</h1>
    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Tabela de vendas
                <a href='{{route('sale.create')}}' class='btn btn-secondary float-right btn-sm rounded-pill'><i class='fa fa-plus'></i>  Nova venda</a></h5>
            <form>
                <div class="form-row align-items-center">
                    <div class="col-sm-5 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Clientes</div>
                            </div>
                            <select class="form-control" id="inlineFormInputName">
                                <option>Clientes</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 my-1">
                        <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Período</div>
                            </div>
                            <input type="text" class="form-control date_range" id="inlineFormInputGroupUsername" placeholder="Username">
                        </div>
                    </div>
                    <div class="col-sm-1 my-1">
                        <button type="submit" class="btn btn-primary" style='padding: 14.5px 16px;'>
                            <i class='fa fa-search'></i></button>
                    </div>
                </div>
            </form>
            <table class='table'>
                <tr>
                    <th scope="col">
                        Produto
                    </th>
                    <th scope="col">
                        Data
                    </th>
                    <th scope="col">
                        Valor
                    </th>
                    <th scope="col">
                        Ações
                    </th>
                </tr>
                @if(count($sales) > 0)
                    @foreach($sales as $sale)
                        <tr>
                            <td>
                                {{$sale->product->name}}
                            </td>
                            <td>
                                {{\Carbon\Carbon::parse($sale->date)->format('d/m/Y')}} {{\Carbon\Carbon::parse($sale->hour)->format('H:m')}}
                            </td>
                            <td>
                                R$ {{ number_format($sale->final_price,2,',','.') }}
                            </td>
                            <td>
                                <a href='' class='btn btn-primary'>Editar</a>
                                <a href='' class='btn btn-danger'>Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" style="vertical-align : middle; text-align:center;">
                            Nenhuma venda cadastrada
                        </td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Resultado de vendas</h5>
            <table class='table'>
                <tr>
                    <th scope="col">
                        Status
                    </th>
                    <th scope="col">
                        Quantidade
                    </th>
                    <th scope="col">
                        Valor Total
                    </th>
                </tr>
                <tr>
                    <td>
                        Vendidos
                    </td>
                    <td>
                        100
                    </td>
                    <td>
                        R$ 100,00
                    </td>
                </tr>
                <tr>
                    <td>
                        Cancelados
                    </td>
                    <td>
                        120
                    </td>
                    <td>
                        R$ 100,00
                    </td>
                </tr>
                <tr>
                    <td>
                        Devoluções
                    </td>
                    <td>
                        120
                    </td>
                    <td>
                        R$ 100,00
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Produtos
                <a href='{{route('product.create')}}' class='btn btn-secondary float-right btn-sm rounded-pill'><i class='fa fa-plus'></i>  Novo produto</a></h5>
            <table class='table'>
                <tr>
                    <th scope="col">
                        Imagem
                    </th>
                    <th scope="col">
                        Nome
                    </th>
                    <th scope="col">
                        Valor
                    </th>
                    <th scope="col">
                        Ações
                    </th>
                </tr>
                @if(count($products) > 0 )
                    @foreach($products as $product)
                        <tr>
                            <td> 
                                <img class="mx-auto d-block img-thumbnail img-fluid" width="70" height="70" 
                                            src="{{ asset($product->local_image) }}">
                            </td>
                            <td>
                                {{$product->name}}
                            </td>
                            <td>
                                R$ {{ number_format($product->price,2,',','.') }}
                            </td>
                            <td>
                                <a href='{{route('product.edit', ['uuid' => $product->uuid])}}' class='btn btn-primary'>Editar</a>
                                <a href='' class='btn btn-danger'>Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" style="vertical-align : middle; text-align:center;">
                            Nenhum produto cadastrado
                        </td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
@endsection
