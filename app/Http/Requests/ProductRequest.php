<?php 

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator; 
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductRequest extends FormRequest {
    public function rules() {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'sku' => 'required|unique:products,sku|max:50',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    /**
     * Handle a failed validation attempt.
     */
    protected function failedValidation(Validator $validator) 
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Validation failed',
            'errors' => $validator->errors()
        ], 422));
    }
}
