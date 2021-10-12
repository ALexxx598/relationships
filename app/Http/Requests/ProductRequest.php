<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
        return [
            'name' => 'min:3|max:50',
            'price' => 'required|integer',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        $response=[
            'status' => 'failure',
            'status_code' => 400,
            'message' => 'Bad Request',
            'errors' => $validator->errors()
        ];

        return new HttpResponseException(response()->json($response, 400));
    }
}
