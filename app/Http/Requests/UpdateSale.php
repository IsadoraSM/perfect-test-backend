<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class UpdateSale extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'client_name' => 'required',
            'client_email' => 'required',
            'client_cpf' => 'required|max:14',
            'product_id' => 'required',
            'date' => 'required|date_format:Y-m-d|before_or_equal: today',
            'hour' => 'required',
            'quantity' => 'required|integer|min:1|max:10',
            'discount' => 'numeric|max:100',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'client_name.required' => 'Informe o nome do cliente',
            'client_email.required' => 'Informe o email do cliente',
            'client_cpf.required' => 'Informe o CPF do cliente',
            'client_cpf.max' => 'O número de digitos do CPF foi ultrapassado: 14 (quatorze)',
            'product_id.required' => 'Selecione um produto',
            'date.required' => 'Informe o dia que a venda foi realizada',
            'date.before_or_equal' => 'O dia da venda deve ser igual ou anterior ao dia de hoje',
            'hour.required' => 'Informe a hora que a venda foi realizada',
            'quantity.required' => 'Informe a quantidade do produto que foi vendido',
            'quantity.integer' => 'Informe uma quantidade válida (apenas números inteiros)',
            'quantity.min' => 'A quantidade vendida do produto deve ser de no mínimo 1 (um)',
            'quantity.max' => 'A quantidade vendida do produto deve ser de no máximo 10 (dez)',
            'discount.numeric' => 'O valor de desconto do produto está inválido',
            'discount.max' => 'O valor de desconto do produto deve ser de no máximo R$100,00',
            'status.required' => 'Selecione um status da venda',
        ];
    }

    public function getValidatorInstance(){
        $this->formatDate();

        $this->formatDiscount();
    
        return parent::getValidatorInstance();
    }

    private function formatDate(){
        $date = $this->request->get('date');

        if($date){
            $formattedDate = Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');

            $this->merge([
                'date' => $formattedDate
            ]);
        }
    }

    private function formatDiscount(){
        $discount = $this->request->get('discount');
        
        $formattedDiscount = str_replace('.', '', $discount);
        $formattedDiscount = str_replace(',', '.', $formattedDiscount);

        $this->merge([
            'discount' => str_replace(',', '.', $formattedDiscount),
        ]);
    }
}
