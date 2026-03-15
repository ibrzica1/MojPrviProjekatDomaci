<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name" => "required|string|min:2|max:50|unique:products,name",
            "description" => "required|string|min:2|max:150",
            "amount" => "required|int",
            "price" => "required|between:0,99.99",
            "image" => "required"
        ];
    }
}
