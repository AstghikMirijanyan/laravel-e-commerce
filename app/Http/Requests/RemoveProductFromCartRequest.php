<?php

namespace App\Http\Requests;

use App\Models\Cart;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RemoveProductFromCartRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        $productId = $this->input('product_id');

        return [
            'product_id' => [
                'required',
                'numeric',
                Rule::exists(Cart::class, 'product_id')->where(function ($query) use ($productId) {
                    $query->where('product_id', $productId);
                }),
            ],
        ];
    }
}
