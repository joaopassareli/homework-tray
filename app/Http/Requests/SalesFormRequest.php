<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalesFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'vendor_id' => ['required'],
            'sale_value' => ['required', 'min:0'],
        ];
    }

    public function messages()
    {
        return [
            'vendor_id' => 'É obrigatório definir um vendedor.',
            //
            'sale.required' => 'É obrigatório definir um valor para a venda',
            'sale.min' => 'O valor da venda deve ser maior que 0',
        ];
    }
}
