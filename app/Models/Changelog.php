<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Changelog extends Model
{
    use HasFactory;

    protected $fillable = [
        'message', 
        'date_created', 
        'date_last_modified', 
        'user_id', 
        'product_id'];

    public $timestamps = false;

    protected $primaryKey = 'changelog_id';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public static function createChangelogEntry($message)
    {
        self::create([
            'message' => $message,
            'user_id' => auth()->user()->user_id,
        ]);
    }
}
