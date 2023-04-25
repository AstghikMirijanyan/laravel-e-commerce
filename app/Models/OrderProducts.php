<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderProducts extends Model
{
    use HasFactory;

    const ORDERS_PRODUCTS_TABLE = 'order_products';
    const ORDER_ID = 'order_id';
    const PRODUCT_ID = 'product_id';
    const PRICE = 'price';
    const TOTAL_PRICE = 'total_price';
    const QUANTITY = 'quantity';
    const UPDATED_AT = 'updated_at';

    protected $table = self::ORDERS_PRODUCTS_TABLE;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        self::ORDER_ID,
        self::PRODUCT_ID,
        self::PRICE,
        self::TOTAL_PRICE,
        self::QUANTITY,
        self::CREATED_AT,
        self::UPDATED_AT,
    ];


    /**
     * @return BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Orders::class);
    }

    /**
     * @return BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
