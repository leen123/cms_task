<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SetPermissionEditorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'new_permissions_ids' => 'present|array',
            'new_permissions_ids.*' => 'required|numeric',
            'deleted_permissions_ids' => 'present|array',
            'deleted_permissions_ids.*' => 'required|numeric'
        ];
    }
}
