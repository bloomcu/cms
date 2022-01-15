<?php

namespace Cms\Http\Menus\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'component' => 'nullable|string',
            'items' => 'nullable|array',
            'items.*.id' => 'required|integer',
            'items.*.title' => 'required|string',
            'items.*.parent_id' => 'nullable|integer',
            'items.*.menu_id' => 'required|integer',
            'items.*.order' => 'required|integer',
            'items.*.children' => 'nullable|array',

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
