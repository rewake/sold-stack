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
            'product_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'style' => 'nullable|string|max:255',
            'brand' => 'nullable|string|max:255',
            'url' => 'nullable|string',
            'product_type' => 'nullable|string|max:255',
            'shipping_price' => 'nullable|integer',
            'note' => 'nullable|string',
            'user_id' => 'required|exists:users,id'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'shipping_price' => round($this->shipping_price * 100),
            'user_id' => auth()->id(),
        ]);
    }
}
