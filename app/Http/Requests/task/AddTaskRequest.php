<?php

namespace App\Http\Requests\task;

use Illuminate\Foundation\Http\FormRequest;

class AddTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'titre' => 'required|string|max:100|unique:tasks',
            'description' => 'required|string|max:500|unique:tasks',
        ];
    }
}
