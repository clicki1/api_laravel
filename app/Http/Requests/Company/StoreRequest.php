<?php

namespace App\Http\Requests\Company;

use App\Service\MyFormRequest;

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
            'title' => 'required|string|min:3|max:40',
            'description' => 'required|string|min:150|max:400',
            'logo' => 'required|max:3000|mimes:png',
        ];
    }
}
