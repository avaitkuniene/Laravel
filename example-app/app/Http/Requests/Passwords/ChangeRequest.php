<?php

namespace App\Http\Requests\Passwords;

use Illuminate\Foundation\Http\FormRequest;

class ChangeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'old_password' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required '
        ];
    }
}
