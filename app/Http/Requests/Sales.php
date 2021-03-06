<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Sales extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'price'               => 'required|integer',
            'previous_price'      => 'integer|nullable',
            'management_fee'      => 'integer|nullable',
            'reserve_fund'        => 'integer|nullable',
            'company_name'        => 'string|nullable|max:255',
            'contact_phonenumber' => 'string|nullable',
            'pic'                 => 'string|nullable|max:255',
            'email'               => 'string|nullable|max:255|email',
            'registered_at'       => 'date|nullable',
            'changed_at'          => 'date|nullable',
        ];
    }

}
