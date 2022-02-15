<?php

namespace Cms\Http\Posts\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class PostUpdateRequest extends FormRequest
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
            'title' => 'nullable|string',

            // TODO: Create custom path rule to enforce format "foo/bar"
            'path' => 'nullable|string',

            // TODO: Create custom slug rule to enforce format "foo-bar"
            'slug' => 'nullable|string',

            'category'  => 'nullable|integer',
            'is_published' => 'nullable|integer',
            'meta.title' => 'nullable|string',
            'meta.description' => 'nullable|string',
            'meta.image' => 'nullable|url',
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
