<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Helpers\NameAndSlugHelper;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BrandController extends Controller
{
    // List all the brands
    public function listBrands()
    {
        $brands = Brand::orderBy('name', 'ASC')->paginate(10);
        return view('admin.brands.index', compact('brands'));
    }

    // Show the detail of the selected brand
    public function detailBrand(Brand $brand)
    {    
        $brand->loadCount('products');

        return view('admin.brands.details', compact('brand'));
    }

    // Redirect to the create form brand page
    public function createBrand()
    {
        return view('admin.brands.create');
    }

    // Adding new brand 
    public function storeNewBrand(Request $request)
    {
        // Validate the request data 
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Message the user if they enter incorrect input
        if ($validator->fails()) {
            // If validation fails, redirect back with error message
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        // Access the generateUniqueSlug function to ensure the uniqueness of the slug
        $slug = NameAndSlugHelper::generateUniqueSlug($request->input('slug'));

        // Access the generateUniqueName function to ensure the uniqueness of the brand and category name 
        $name = NameAndSlugHelper::generateUniqueName($request->input('name'));

        // Creating brand instance 
        $brand = new Brand;
        $brand->name = $name;
        $brand->slug = $slug;
        
        // Handling the selected image for uploading into specific
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('assets/images/uploads/brands/', $filename);
            $brand->image = $filename;
        } 
    
        // Save brand
        $brand->save();
    
        return redirect()->route('admin.brands.index')->with('success', 'Brand created successfully.');
    }

    // Redirect to the edit form brand page
    public function editBrand(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    // Updating brand details
    public function updateBrand(Request $request, Brand $brand)
    {
        // Validate the request data 
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Message the user if they enter incorrect input
        if ($validator->fails()) {
            // If validation fails, redirect back with error message
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        // Get the original slug before any changes
        $originalSlug = $brand->slug;

        // Access the generateUniqueSlug function only if the slug has been updated
        $slug = $request->input('slug');
        if ($slug !== $originalSlug) {
            $slug = NameAndSlugHelper::generateUniqueSlug($slug);
        } else {
            // Keep the original slug if it hasn't been changed
            $slug = $originalSlug;
        }

        // Get the original name before any changes
        $originalName = $brand->name;
        // Access the generateUniqueName function only if the name has been updated
        $name = $request->input('name');
        if ($name !== $originalName) {
            $name = NameAndSlugHelper::generateUniqueName($name);
        } else {
            // Keep the original slug if it hasn't been changed
            $name = $originalName;
        }

        $brand->name = $name; 
        $brand->slug = $slug;

        // Handle image upload
        if ($request->hasFile('image')) {
            $destination = 'assets/images/uploads/brands/'.$brand->image;
            if(File::exists($destination)) 
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('assets/images/uploads/brands/', $filename);
            $brand->image = $filename;
        } 

        // Updating the brand
        $brand->update();

        return redirect()->route('admin.brands.index')
            ->with('success', 'Brand updated successfully.');
    }

    // Show the delete confirmation page
    public function showDeleteConfirmation(Brand $brand)
    {
        return view('admin.brands.delete', compact('brand'));
    }

    // Delete selected brand-
    public function deleteBrand(Brand $brand)
    {
        // Check if the brand is associated to the products 
        if ($brand->products()->exists()) {
            return redirect()->route('admin.brands.index')
                ->with('error', 'Unable to delete brand ID: ' .  $brand->brand_id . ', Brand Name: '.  $brand->name .  '. Products linked to this brand. Please remove association before deleting again.');
        }

        $destination = 'assets/images/uploads/brands/'.$brand->image;
        // Delete the image file
        if(File::exists($destination)) {
            File::delete($destination);
        }

        // Delete the brand
        $brand->delete();

        return redirect()->route('admin.brands.index')
            ->with('success', 'Brand deleted successfully.');
        
    }
}
