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
            'post_id'       => 'required|exists:posts,id',
            'order'         => 'nullable|integer|min:0',
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

            'post_id.required' => 'Page id is required',
            'post_id.exists' => 'Page does not exist',

            'order.integer' => 'Order must be an integer',
            'order.min' => 'Order cannot be negative',
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
