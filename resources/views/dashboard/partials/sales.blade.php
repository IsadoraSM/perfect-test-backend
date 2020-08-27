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
                            <form action="{{route('sale.delete', ['uuid' => $sale->uuid])}}" method="POST">                                    
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <div style="display: flex; justify-content: space-around">
                                    <a href='{{route('sale.edit', ['uuid' => $sale->uuid])}}' class='btn btn-primary'>Editar</a>
                                    <button class='btn btn-danger' type="submit">Excluir</button>
                                </div>
                            </form>
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