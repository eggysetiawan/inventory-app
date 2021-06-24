<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => ['string', 'required', 'max:255', Rule::unique('products')->ignore($this->product->name, 'name')],
            'description' => ['string', 'required'],
            'quantity' => ['numeric', 'min:0'],
            'img' => ['image', 'mimes:png,jpg,jpeg', 'max:2000'],
        ];
    }
}
