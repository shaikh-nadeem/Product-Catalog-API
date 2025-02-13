<?php 

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

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
}
