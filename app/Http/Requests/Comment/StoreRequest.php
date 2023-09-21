<?php

namespace App\Http\Requests\Comment;

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
            'user_id' => 'required|integer|exists:App\Models\User,id',
            'company_id' => 'required|integer||exists:App\Models\Company,id',
            'content' => 'required|string|min:150|max:400',
            'rating' => 'required|integer|min:1|max:10',
        ];
    }
}
