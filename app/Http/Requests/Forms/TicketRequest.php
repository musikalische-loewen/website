<?php

namespace App\Http\Requests\Forms;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email'],
            'number_full' => ['required', 'integer'],
            'number_reduced' => ['required', 'integer'],
            'number_free' => ['required', 'integer'],
        ];
    }
}
