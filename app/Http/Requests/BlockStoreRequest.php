<?php

namespace App\Http\Requests;

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
            'uuid'        => 'required',
            'title'       => 'required|string',
            'component'   => 'required|string',
            'layout_id'   => 'required|exists:layouts,id',
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
            'uuid.required' => 'Uuid is required',
            'title.required' => 'Title is required',
            'title.string' => 'Title must be a string',

            'component.required' => 'Component is required',
            'component.string' => 'Component must be a string',

            'layout_id.required' => 'Layout id is required',
            'layout_id.exists' => 'Layout does not exist',

            'order.integer' => 'Order must be an integer',
            'order.min' => 'Order cannot be negative',

            'category_id.integer' => 'Category must be an integer',
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
