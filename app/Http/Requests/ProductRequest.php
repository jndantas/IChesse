<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                    'title' => ['required', 'min:3', 'max:255', "unique:products,title,{$id},id"],
                    'description' => ['required', 'min:3', 'max:500'],
                    'image' => ['required', 'image'],
                    'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
                ];
                break;
            }
            case 'PUT':
                return [
                    'image' => ['nullable', 'image'],
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
        'name.required' => 'O campo nome é obrigatorio.',
        'name.min' => 'O campo nome deve conter mais de 3 caracteres.',

        ];
    }
}
