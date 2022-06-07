<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankTransactionRequest extends FormRequest
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
            'account-number' => 'required|min:6|max:6',
            'costumer-name' => 'required',
            'transaction-date' => 'required|date_format:Y-m-d|after:yesterday',
        ];
    }

    public function attributes()
    {
        return [
            'account-number' => 'Account Number',
            'costumer-name' => 'Costumer Name',
            'transaction-date' => 'Transaction Date',
        ];
    }

}
