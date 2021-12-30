<?php

namespace Cms\Http\Blocks\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlockRequest extends FormRequest
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
            'title'         => ['nullable', 'string'],
            'component'     => ['nullable', 'string'],
            'order'         => ['nullable', 'integer', 'min:0'],

            'data.label'    => ['nullable', 'string'],
            'data.title'    => ['nullable', 'string'],
            'data.subtitle' => ['nullable', 'string'],
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
            'title.required' => 'Title is required',
            'title.string' => 'Title must be a string',

            'component.required' => 'Component is required',
            'component.string' => 'Component must be a string',

            'order.integer' => 'Order must be an integer',
            'order.min' => 'Order cannot be negative',

            'data.label.string' => 'Label must be a string',
            'data.label.title' => 'Title must be a string',
            'data.label.subtitle' => 'Subtitle must be a string',
        ];
    }
}
