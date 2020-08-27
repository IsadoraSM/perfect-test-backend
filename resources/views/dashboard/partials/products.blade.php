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
                            <form action="{{route('product.delete', ['uuid' => $product->uuid])}}" method="POST">                                    
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <div style="display: flex; justify-content: space-around">
                                    <a href='{{route('product.edit', ['uuid' => $product->uuid])}}' class='btn btn-primary'>Editar</a>
                                    <button class='btn btn-danger' type="submit">Excluir</button>
                                </div>
                            </form>
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