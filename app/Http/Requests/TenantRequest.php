<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenantRequest extends FormRequest
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
        $id = $this->segment(3);

        switch($this->method())
        {
            case 'GET':
                break;
            case 'DELETE':
                break;
            case 'POST':
            {
                return [
                    'name' => ['required', 'min:3', 'max:255', "unique:tenants,name,{$id},id"],
                    'email' => ['required', 'min:3', 'max:255', "unique:tenants,email,{$id},id"],
                    'cnpj' => ['required', 'digits:14', "unique:tenants,cnpj,{$id},id"],
                    'logo' => ['nullable', 'image'],
                    'active' => ['required', 'in:Y,N'],

                    // subscription
                    'subscription' => ['nullable', 'date'],
                    'expires_at' => ['nullable', 'date'],
                    'subscription_id' => ['nullable', 'max:255'],
                    'subscription_active' => ['nullable', 'boolean'],
                    'subscription_suspended' => ['nullable', 'boolean'],
                ];
                break;
            }
            case 'PUT':
                return [
                    'name' => ['required', 'min:3', 'max:255', "unique:tenants,name,{$id},id"],
                    'email' => ['required', 'min:3', 'max:255', "unique:tenants,email,{$id},id"],
                    'cnpj' => ['required', 'digits:14', "unique:tenants,cnpj,{$id},id"],
                    'logo' => ['nullable', 'image'],
                    'active' => ['required', 'in:Y,N'],

                    // subscription
                    'subscription' => ['nullable', 'date'],
                    'expires_at' => ['nullable', 'date'],
                    'subscription_id' => ['nullable', 'max:255'],
                    'subscription_active' => ['nullable', 'boolean'],
                    'subscription_suspended' => ['nullable', 'boolean'],
                ];
                break;
            case 'PATCH':
                break;
            default:
            break;
        }
    }

    public function messages(){
        return [
        //

        ];
    }
}
