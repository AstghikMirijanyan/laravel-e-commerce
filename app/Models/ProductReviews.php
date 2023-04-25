<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReviews extends Model
{
    use HasFactory;
    const PRODUCT_REVIEWS_TABLE = 'product_reviews';
    const PRODUCT_ID = 'product_id';
    const USER_ID = 'user_id';

    const RATING = 'rating';
    const TEXT = 'text';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = self::PRODUCT_REVIEWS_TABLE;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        self::RATING,
        self::TEXT,
        self::PRODUCT_ID,
        self::CREATED_AT,
        self::UPDATED_AT,
        self::USER_ID
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
