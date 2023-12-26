<?php

namespace App\Http\Requests\Admin;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
class UpdateEditorRequest extends FormRequest
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
            'name' => [ 'string', 'max:255', 'unique:'.User::class],
            'email' => [ 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => [ 'confirmed', Rules\Password::defaults()],
        ];
    }
}
