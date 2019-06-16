<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:products,name|max:255',
            'amount' => 'required|numeric',
            'fixed_price' => 'required|numeric',
            'active' => 'required|integer',
            'active_at' => 'nullable|date',
            'discount.*' => 'nullable|exists:discounts,id',
            'image' => 'required|file',
        ];
    }

    public function messages()
    {
        return [
            'discount.*' => 'The selected discount is invalid',
            'title.required' => 'A title is required',
            'body.required'  => 'A message is required',
        ];
    }
}
