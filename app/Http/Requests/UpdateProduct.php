<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduct extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:100',
            'image' => 'mimes:jpeg,bmp,png'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Informe o nome do produto',
            'description.required' => 'Informe a descrição do produto',
            'price.required' => 'Informe o valor do produto',
            'price.numeric' => 'O valor do produto está inválido',
            'price.min' => 'O valor do produto deve ser de no mínimo R$100,00',
            'image.mimes' => 'A extenção da imagem do produto precisa ser png ou jpeg'
        ];
    }

    public function getValidatorInstance(){
        $this->formatPrice();
    
        return parent::getValidatorInstance();
    }

    private function formatPrice(){
        $price = $this->request->get('price');
        
        $formattedPrice = str_replace('.', '', $price);
        $formattedPrice = str_replace(',', '.', $formattedPrice);

        $this->merge([
            'price' => str_replace(',', '.', $formattedPrice),
        ]);
    }
}
