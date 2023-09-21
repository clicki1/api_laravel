<?php
namespace App\Service;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class MyFormRequest extends FormRequest {

    /**
     * @inheritDoc
     */
    protected function failedValidation(Validator $validator) {
        $response = response()
            ->json([ 'result' => false, 'message' => $validator->errors()->first() ], 422);

        throw (new ValidationException($validator, $response))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}
