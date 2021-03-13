<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
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
            'project_id' => 'required',
            'task_name' => 'required|string',
            'task_details' => 'required'
        ];
    }

    public function messages(){
        return [
            'project_id.required' => trans('text.task.validation.project_id'),
            'task_name.required' => trans('text.task.validation.name_empty'),
            'task_details.required' => trans('text.task.validation.details_empty'),
        ];
    }
}
