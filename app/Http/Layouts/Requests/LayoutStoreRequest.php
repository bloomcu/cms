<?php

namespace Cms\Http\Layouts\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LayoutStoreRequest extends FormRequest
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
            'title' => 'required|string',
            'post_id' => 'required|integer',
            'category_id' => 'nullable|integer',
            'page_id' => 'required|integer',
            'category' => 'nullable|integer'
        ];
    }
}
