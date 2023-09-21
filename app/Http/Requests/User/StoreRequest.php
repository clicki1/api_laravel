<?php

namespace App\Http\Requests\User;

use App\Service\MyFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends MyFormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:40',
            'surname' => 'required|string|min:3|max:40',
            'phone' => 'required|regex:/^\+7\d{10}$/u',
            'avatar' => 'nullable|max:2000|mimes:png,jpg',
        ];
    }
}
