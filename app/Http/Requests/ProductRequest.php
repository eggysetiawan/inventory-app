<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => ['string', 'required', 'max:255', 'unique:products,name'],
            'description' => ['string', 'required'],
            'quantity' => ['numeric', 'min:0'],
            'img' => ['image', 'mimes:png,jpg,jpeg', 'max:2000'],
        ];
    }
}
