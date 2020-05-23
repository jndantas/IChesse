<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            case 'POST':
            {
                return [
                    'name' => "required|min:3|max:255|unique:roles,name,{$id},id",
                    'description' => 'nullable|min:3|max:255',
                ];
                break;
            }
            case 'PUT':
                return [
                    'name' => "required|min:3|max:255|unique:roles,name,{$id},id",
                    'description' => 'nullable|min:3|max:255',
                ];
                break;
            default:
                break;
        }
    }

    public function messages(){
        return [
            'name.required' => 'O campo nome é obrigatorio.',
            'name.min' => 'O campo nome deve conter mais de 3 caracteres.',

        ];
    }
}
