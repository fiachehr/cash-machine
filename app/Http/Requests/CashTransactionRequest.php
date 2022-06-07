<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CashTransactionRequest extends FormRequest
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
            'amount' => "nullable|prohibited_unless:correct-amount,null|required_without:correct-amount|in:1,5,10,50,100",
            'correct-amount' => 'nullable|prohibited_unless:amount,null|required_without:amount|integer|max:10000|min:1',
        ];
    }

    public function attributes()
    {
        return [
            'correct-amount' => 'Correct Amount',
        ];
    }

    public function messages()
    {
        return [
            'prohibited_unless' => 'Only One field is Required',
        ];
    }
}
