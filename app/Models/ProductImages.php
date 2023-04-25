<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;

    const PRODUCT_IMAGES_TABLE = 'product_images';
    const PRODUCT_ID = 'product_id';
    const IMAGE = 'image';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = self::PRODUCT_IMAGES_TABLE;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        self::IMAGE,
        self::PRODUCT_ID,
        self::CREATED_AT,
        self::UPDATED_AT,
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
