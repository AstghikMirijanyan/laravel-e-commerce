<?php

namespace App\Http\Requests;

use App\Models\Cart;
use App\Models\Orders;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ChangeOrderStatusRequest extends FormRequest
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
        $orderId = $this->input('order_id');

        return [
            'order_id' => [
                'required',
                'numeric',
                Rule::exists(Orders::class, 'order_id')->where(function ($query) use ($orderId) {
                    $query->where('order_id', $orderId);
                }),
            ],
            'status' => 'required|string|max:255',
        ];
    }
}
