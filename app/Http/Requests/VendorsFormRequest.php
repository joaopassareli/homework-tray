<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorsFormRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'min:10', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório e deve ser preenchido',
            'nome.min' => 'O campo nome deve possuir ao menos :min caracteres.',
            'nome.max' => 'O campo nome não pode possuir mais que :max caracteres',
            //
            'email.required' => 'O email nome é obrigatório e deve ser preenchido',
            'email.min' => 'O campo email deve possuir ao menos :min caracteres.',
            'email.max' => 'O campo email não pode possuir mais que :max caracteres',
        ];
    }
}
