<?php

namespace App\Http\Requests;

use App\Http\Responses\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:64',
            'email' => 'required|unique:users|email|min:8|max:64',
            'password' => 'required|min:4|max:64',
            'rol_id'=>'required'
        ];
    }

    /*public function messages(){
        return [
            'email.min' => 'Entiende que el minimo son 8 caracteres',
            'email.email' => 'No es un correo electrónico válido'
        ];
    }*/

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(ApiResponse::error('Ocurrieron Errores',404, $errors));
        parent::failedValidation($validator);
    }
}
