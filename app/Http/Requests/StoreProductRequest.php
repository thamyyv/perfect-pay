<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'description' => 'required',
            'collor_id' => 'required|'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo Nome do Produto é obrigatório.',
            'description.required' => 'O campo Descrição do Produto é obrigatório.',
            'collor_id.required' => 'O campo Cor do Produto é obrigatório.',
        ];
    }
}

