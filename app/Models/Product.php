<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = "product_id";

    protected $fillable = [
        'name',
        'slug',
        'product_model',
        'manufacturer',
        'short_description',
        'description',
        'regular_price',
        'sale_price',
        'SKU',
        'stock_status',
        'stock_on_hand',
        'featured',
        'image',
        'category_id',
        'brand_id',
        'feature_id',
    ];

    public function setSKUAttribute($value)
    {
        $this->attributes['SKU'] = $value ?: $this->generateRandomSKU();
    }

    protected function generateRandomSKU()
    {
        // Generate three random letters
        $letters = Str::random(3);

        // Generate three random numbers
        $numbers = rand(100, 999);

        // Concatenate the letters and numbers to form the SKU
        return strtoupper($letters . $numbers);
    }

    protected $attributes = [
        'stock_status' => 'instock', // stock_status default value is instoc
        'short_description' => 'short description ... ',
        'featured' => false,
        'stock_on_hand' => 10,
        'images'=> null,
    ];
    

    public function changelogs()
    {
        return $this->hasMany(Changelog::class,'product_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'feature_product', 'product_id', 'feature_id');
    }

    public function primaryFeature()
    {
        return $this->belongsTo(Feature::class, 'feature_id');
    }
}
