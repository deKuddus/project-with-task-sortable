<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
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
        $id = $this->project->id;
        return [
            'name' => 'required|string|min:5|unique:projects,name,'.$id.',id'
        ];
    }

    public function messages(){
        return [
            'name.required' => trans('text.project.validation.name_empty'),
            'name.unique' => trans('text.project.validation.name_unique'),
            'name.min' => trans('text.project.validation.name_min'),
            'name.string' => trans('text.project.validation.name_string'),
        ];
    }
}
