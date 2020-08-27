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
                    {{ isset($result_sales[0]) ? $result_sales[0]->quantity : '0' }}
                </td>
                <td>
                    R$ {{ isset($result_sales[0]) ? number_format($result_sales[0]->total,2,',','.') : '0,00' }}
                </td>
            </tr>
            <tr>
                <td>
                    Cancelados
                </td>
                <td>
                    {{ isset($result_sales[1]) ? $result_sales[1]->quantity : '0' }}
                </td>
                <td>
                    R$ {{ isset($result_sales[1]) ? number_format($result_sales[1]->total,2,',','.') : '0,00' }}
                </td>
            </tr>
            <tr>
                <td>
                    Devoluções
                </td>
                <td>
                    {{ isset($result_sales[2]) ? $result_sales[2]->quantity : '0' }}
                </td>
                <td>
                    R$ {{ isset($result_sales[2]) ? number_format($result_sales[2]->total,2,',','.') : '0,00' }}
                </td>
            </tr>
        </table>
    </div>
</div>