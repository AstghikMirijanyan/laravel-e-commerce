<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductReviewsRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'product_id' => 'required|integer',
            'user_id' => 'required|integer',
            'rating' => 'required|numeric|min:1|max:5',
            'text' => 'required|string|max:255',
        ];
    }
}
