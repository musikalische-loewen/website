<?php

namespace App\Http\Requests\Forms;

use Illuminate\Foundation\Http\FormRequest;

class MembershipRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => ['required', 'in:aktiv,passiv'],
            'start' => ['required', 'date_format:Y-m-d'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'street' => ['required', 'string'],
            'zip' => ['required', 'numeric', 'digits:5'],
            'city' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
            'instrument' => ['nullable', 'string'],
            'birthday' => ['required', 'date_format:Y-m-d'],
            'anniversary' => ['nullable', 'date_format:Y-m-d'],
            'iban'  => ['required', 'iban'],
            'bic' => ['required', 'bic'],
            'bank_account_owner' => ['required', 'string'],
        ];
    }
}
