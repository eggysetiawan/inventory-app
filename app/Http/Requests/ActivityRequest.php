<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class ActivityRequest extends FormRequest
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
            'product' => ['required', 'integer', 'in:' . implode(",", Product::pluck('id')->toArray())],
            'status' => ['required', 'string', 'in:in,out'],
            'quantity' => ['required', 'numeric', 'min:1'],
        ];
    }
}
