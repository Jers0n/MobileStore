<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $primaryKey = "feature_id";

    protected $fillable = [
        'weight',
        'dimensions',
        'OS',
        'screensize',
        'resolution',
        'CPU',
        'RAM',
        'storage',
        'battery',
        'rear_camera',
        'front_camera',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'feature_product', 'feature_id', 'product_id');
    }
}
