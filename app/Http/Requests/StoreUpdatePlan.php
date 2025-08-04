<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePlan extends FormRequest
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
        /* Caso de exceção para editar o plano */
        $url = $this->segment(3); /* http://larafood.test/admin/plans/plano/edit retorna o campo "plano"  */
        

        return [
            'name' => "required|min:3|max:255|unique:plans,name,{$url},url", /* Campo obrigatório */ /* A parte do nome ela é única, devido a dar problema no banco de dados */
            'description' => 'nullable|min:3|max:255', /* Campo NULL */
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/", /* Campo obrigatório */
        ];
    }
}
