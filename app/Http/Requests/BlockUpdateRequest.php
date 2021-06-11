<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlockUpdateRequest extends FormRequest
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
            'title'       => 'nullable|string',
            'component'   => 'nullable|string',
            'order'       => 'nullable|integer|min:0',
            'category_id' => 'nullable|integer'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.string' => 'Title must be a string',
            'component.string' => 'Component must be a string',
            'order.integer' => 'Order must be an integer',
            'order.min' => 'Order cannot be negative',
            'category_id.integer' => 'Category must be an integer',
        ];
    }
}
