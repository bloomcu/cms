<?php

namespace Cms\Http\Menus\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class MenuUpdateRequest extends FormRequest
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
            'location' => [
                'nullable',
                'string',
                Rule::unique('menus')->ignore($this->menu->id)
            ],
            'component' => 'nullable|string',
            'children' => 'nullable|array',
            'children.*.title' => 'required|string',
            'children.*.location' => 'nullable|string',
            'children.*.component' => 'nullable|string',
            'children.*.children' => 'nullable|array',

            // TODO: Nested item properties which are not listed in rules
            // are making it through the request validation. Such as UUID.

            // TODO: Use a custom Request Validator to validate each item in items array.
            // Currently, we're only validating "items" and not recursively nested children.
            // Ref: https://laravel.com/docs/8.x/validation#validating-arrays

            // Another option might be to make a custom rule that validates an items:
            // "id, title, parent_id, menu_id, order" and run that on "items", and "items.*.children"
            // The question is, will that recursively validate deeply nested child arrays?

            // Another option might be to flatten the items and validate that, easy.
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
