<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\Rule;

class ItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false;
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
            'name' => ['required', 'string'],
            'code' => ['required', 'string', 
                           Rule::unique('items')->ignore($this->id)],
            'price' => ['required', 'integer', 'min:0', 'max:10000000'],
            'amount' => ['integer', 'min:0', 'max:10000'],
        ];
    }

    public function messages()
    {
        return [
            'amount.integer' => Lang::get('messages.amount_invalid'),
            'price.integer' => Lang::get('messages.price_invalid'),
            'code.unique' => Lang::get('messages.code_unique'),
        ];
    }

}
