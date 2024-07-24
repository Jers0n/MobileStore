<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use App\Models\Product; 
use App\Models\Category; 
use App\Models\Brand; 


class NameAndSlugHelper
{
    // Generate a unique slug if the user input is already taken
    public static function generateUniqueSlug($slug)
    {
        $baseSlug = Str::slug($slug);
        $uniqueSlug = $baseSlug;
        $count = 1;

        // Check if the initial slug already exists in the database
        while (Product::where('slug', $uniqueSlug)->exists() ||    Brand::where('slug', $uniqueSlug)->exists() || Category::where('slug', $uniqueSlug)->exists()) {
            // If it does, append a numeric suffix and check again
            $uniqueSlug = $baseSlug . '-' . $count;
            $count++;
        }

        return $uniqueSlug;
    }

    public static function generateUniqueName($name)
    {
        $baseName = Str::title($name);
        $uniqueName = $baseName;
        $count = 1;

        // Check if the initial name already exists in the database
        while (Product::where('name', $uniqueName)->exists()|| Brand::where('name', $uniqueName)->exists() || Category::where('name', $uniqueName)->exists()) {
            // If it does, append a numeric suffix and check again
            $uniqueName = $baseName . '-' . $count;
            $count++;
        }

        return $uniqueName;
    }
}
