<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    const CART_TABLE = 'cart';
    const PRODUCT_ID = 'product_id';
    const USER_ID = 'user_id';
    const QUANTITY = 'quantity';
    const TOTAL_PRICE = 'total_price';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = self::CART_TABLE;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        self::PRODUCT_ID,
        self::USER_ID,
        self::QUANTITY,
        self::TOTAL_PRICE,
        self::CREATED_AT,
        self::UPDATED_AT,
    ];

    // Define the relationship to the product product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
