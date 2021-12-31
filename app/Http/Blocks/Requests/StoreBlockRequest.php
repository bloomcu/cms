<?php

namespace Cms\Http\Blocks\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

use Cms\Domain\Blocks\DTO\BlockDTO;

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
            'uuid'          => ['nullable', 'uuid', 'unique:blocks,uuid'],
            'title'         => ['required', 'string'],
            'component'     => ['required', 'string'],
            'layout_id'     => ['required', 'integer', 'exists:layouts,id'],

            'data.label'    => ['nullable', 'string'],
            'data.title'    => ['nullable', 'string'],
            'data.subtitle' => ['nullable', 'string'],

            'data.image.id' => ['nullable', 'integer', 'exists:files,id'],
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
            'uuid.unique' => 'The UUID provided is already in use',
            'layout_id.exists' => 'A layout with this id does not exist',
            'data.image.id.exists' => 'A file with this id does not exist',
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

    // /**
    //  * Build and return a DTO.
    //  *
    //  * @return BlockDTO
    //  */
    // public function toDTO(): BlockDTO
    // {
    //     return new BlockDTO([ // TODO: rename to StoreBlockDTO
    //         'uuid'      => $this->uuid ?? null,
    //         'title'     => $this->title,
    //         'component' => $this->component,
    //         'layout_id' => intval($this->layout_id),
    //         'data'      => [
    //             'label'    => $this->data['label'] ?? null,
    //             'title'    => $this->data['title'] ?? null,
    //             'subtitle' => $this->data['subtitle'] ?? null,
    //             // 'image_id' => isset($this->data['image']) ? intval($this->data['image']['id']) : null,
    //             'image'    => [
    //                 'id' => isset($this->data['image']) ? intval($this->data['image']['id']) : null,
    //             ]
    //         ]
    //     ]);
    // }
}
