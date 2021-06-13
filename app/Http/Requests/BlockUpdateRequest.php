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
            'title'         => 'nullable|string',
            'component'     => 'nullable|string',
            'layout_id'     => 'nullable|exists:layouts,id',
            'order'         => 'nullable|integer|min:0',
            'base_block_id' => 'nullable|exists:base_blocks,id'
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

            'layout_id.exists' => 'Layout does not exist',

            'order.integer' => 'Order must be an integer',
            'order.min' => 'Order cannot be negative',

            'base_block_id.exists' => 'Base Block does not exist'
        ];
    }
}
