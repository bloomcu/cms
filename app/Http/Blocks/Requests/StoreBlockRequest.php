<?php

namespace Cms\Http\Blocks\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

use Cms\Domain\Blocks\DTO\StoreBlockDTO;

class StoreBlockRequest extends FormRequest
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
            'title'         => ['required', 'string'],
            'component'     => ['required', 'string'],
            'layout_id'     => ['required', 'integer', 'exists:layouts,id'],

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
            // 'uuid.uuid' => 'Uuid must be a valid RFC universally unique identifier (UUID)',

            'title.required' => 'Title is required',
            'title.string' => 'Title must be a string',

            'component.required' => 'Component is required',
            'component.string' => 'Component must be a string',

            'layout_id.required' => 'Layout id is required',
            'layout_id.integer' => 'Layout id must be an integer',
            'layout_id.exists' => 'Layout does not exist',

            'data.label.string' => 'Label must be a string',
            'data.label.title' => 'Title must be a string',
            'data.label.subtitle' => 'Subtitle must be a string',
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

    /**
     * Build and return a DTO.
     *
     * @return StoreBlockDTO
     */
    public function toDTO(): StoreBlockDTO
    {
        dd($this->validated());
        return new StoreBlockDTO([
            'title'     => $this->title,
            'component' => $this->component,
            'layout_id' => intval($this->layout_id),
            'data'      => [
                'label'    => $this->data['label'] ?? null,
                'title'    => $this->data['title'] ?? null,
                'subtitle' => $this->data['subtitle'] ?? null,
            ]
        ]);
    }
}
