<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Orders extends Model
{
    use HasFactory;

    const ORDERS_TABLE = 'orders';
    const STATUS = 'status';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = self::ORDERS_TABLE;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        self::STATUS,
        self::CREATED_AT,
        self::UPDATED_AT,
    ];


    /**
     * @return HasMany
     */
    public function orderProducts()
    {
        return $this->hasMany(OrderProducts::class, 'product_id');
    }

    public function products()
    {
        return $this->hasManyThrough(Product::class, OrderProducts::class,'order_id','id');
    }
}
