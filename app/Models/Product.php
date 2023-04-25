<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const PRODUCTS_TABLE = 'products';
    const NAME = 'name';
    const PRICE = 'price';
    const SALE_PRICE = 'sale_price';
    const IMAGE = 'image';
    const SHORT_DESCRIPTION = 'short_description';
    const DESCRIPTION = 'description';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = self::PRODUCTS_TABLE;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        self::NAME,
        self::PRICE,
        self::SALE_PRICE,
        self::IMAGE,
        self::SHORT_DESCRIPTION,
        self::DESCRIPTION,
        self::CREATED_AT,
        self::UPDATED_AT,
    ];

    // Define the relationship to the product reviews
    public function reviews()
    {
        return $this->hasMany(ProductReviews::class);
    }

    // Define the relationship to the product images
    public function images()
    {
        return $this->hasMany(ProductImages::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
