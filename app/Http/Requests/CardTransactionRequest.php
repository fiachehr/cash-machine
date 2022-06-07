<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'amount' => 'required|integer|min:1',
            'card-number' => 'required|digits:16|starts_with:4',
            'card-holder' => 'required',
            'cvv' => 'required|digits:3',
            'expire-date' => 'required|after:+2 month',

        ];
    }
}
