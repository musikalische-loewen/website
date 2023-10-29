<?php

namespace App\Http\Requests\Forms;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class TicketRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email'],
            'number_full' => ['required', 'integer', 'min:0'],
            'number_free' => ['required', 'integer', 'min:0'],
        ];
    }

    /**
     * Get the "after" validation callables for the request.
     */
    public function after(): array
    {
        return [
            function (Validator $validator) {
                if ($this->number_full == 0 && $this->number_reduced == 0) {
                    $validator->errors()->add(
                        'number_free',
                        'Bitte wählen Sie mindestens ein Ticket für Erwachsene/Jugendliche aus.
                        Es ist nicht notwendig Tickets (nur) für Kinder zu bestellen.'
                    );
                }
            }
        ];
    }
}
