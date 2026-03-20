<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class IPAddressRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $ipVersion = $this->input('ip_version');
        
        return [
            'ip_version' => ['required', 'integer', Rule::in([4,6])],
            'ip_address' => [
                'required', 
                'string', 
                $ipVersion == 4 ? 'ipv4' : 'ipv6',
                'unique:ip_address,ip_address'
            ],
            'label' => 'nullable|string|max:255',
            'created_by' => ['required', 'integer']
        ];
    }

    public function messages(): array 
    {
        return [
            'ip_address.required' => 'Ip address is required',
            'ip_address.unique' => 'Ip address already exists.',
            'ip_address.integer' => 'Only integer values are accepted',
            'ip_version.required' => 'Ip version is required',
            'ip_version.in' => 'Ip version only 4 or 6',
            'label.max' => 'Label must be 255 characrers or less',
            'created_by.required' => 'Created by is required',
            'created_by.integer' => 'Created by must be an integer'
        ];
    }

    // triggered when validation failed
    protected function failedValidation(Validator $validator) 
    {
        throw new HttpResponseException (response()->json([
            'message' => 'Validation Failed.',
            'errors' => $validator->errors(),
            'success' => false,
        ], 422));
    }
}
