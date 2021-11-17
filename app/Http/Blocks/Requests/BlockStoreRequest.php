<?php

namespace Cms\Http\Blocks\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BlockStoreRequest extends FormRequest
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
            'uuid'          => 'nullable|uuid|unique:blocks',
            'title'         => 'required|string',
            'component'     => 'required|string',
            'page_id'       => 'required|exists:pages,id',
            'order'         => 'nullable|integer|min:0',
            // 'base_block_id' => 'required|exists:base_blocks,id',
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
            'uuid.uuid' => 'Uuid must be a valid RFC universally unique identifier (UUID)',

            'title.required' => 'Title is required',
            'title.string' => 'Title must be a string',

            'component.required' => 'Component is required',
            'component.string' => 'Component must be a string',

            'page_id.required' => 'Page id is required',
            'page_id.exists' => 'Page does not exist',

            'order.integer' => 'Order must be an integer',
            'order.min' => 'Order cannot be negative',

            // 'base_block_id.required' => 'Base Block id is required',
            // 'base_block_id.exists' => 'Base Block does not exist',
        ];
    }

    /**
     * Return exception as json
     *
     * @return Exception
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
