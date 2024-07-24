<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Feature;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use App\Helpers\NameAndSlugHelper;
use Illuminate\Support\Facades\File;
use Illuminate\Database\QueryException;
use Log;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    public function listProducts()
    {
        // $products = Product::paginate(5);

        $products = Product::with(['features' => function ($query) {
            $query->select('OS', 'resolution', 'cpu', 'ram', 'storage', 'battery'); // Select only specific columns from the features table
        }])->paginate(9);
        return view('admin.products.index', compact('products'));
    }

    public function detailProduct($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('admin.products.details', compact('product'));
    }

    public function createProduct()
    {
        // Generate new random 
        $generatedSku = Product::generateRandomSKU();
        $brands = Brand::all();
        $categories = Category::all();
        $features = Feature::all();

        return view('admin.products.create', compact('generatedSku','brands', 'categories', 'features')); 
    }

    public function storeNewProduct(Request $request)
    {
        // Validate the request data 
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:products|max:255', // Ensure that the new product name created is unique
            'slug' => 'required|string|max:255',
            'product_model' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'description' => 'required|string',
            'regular_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'SKU' => 'required|string',
            'stock_on_hand' => 'required|integer',
            'stock_status' => 'required|string|max:255',
            'featured' => 'nullable|boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categories.*' => [
                'required',
                Rule::exists('categories', 'category_id'), 
            ],
            'brands.*' => [
                'required',
                Rule::exists('brands', 'brand_id'), 
            ],
            'features.*' => [
                'required',
                Rule::exists('features', 'feature_id'), 
            ],
        ], [
            'images.*.image' => 'The :attribute must be an image.',
            'images.*.mimes' => 'The :attribute must be a file of type: :values.',
            'images.*.max' => 'The :attribute may not be greater than :max kilobytes.',
        ]);
    
        // Message the user if they enter incorrect input
        if ($validator->fails()) {
            // If validation fails, redirect back with error message
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        // Access the generateUniqueSlug function to ensure the uniqueness of the slug
        $slug = NameAndSlugHelper::generateUniqueSlug($request->input('slug'));

        // Creating product instance 
        $product = new Product;
        $product->name = $request->input('name');
        $product->slug = $slug;
        $product->product_model = $request->input('product_model');
        $product->manufacturer = $request->input('manufacturer');
        $product->short_description = $request->input('short_description');
        $product->description = $request->input('description');
        $product->regular_price = $request->input('regular_price');
        $product->sale_price = $request->input('sale_price');
        $product->SKU = null;
        $product->stock_status = $request->input('stock_status');
        $product->featured = $request->input('featured');
        $product->category_id = $request->input('categories'); 
        $product->brand_id = $request->input('brands'); 
        $product->feature_id = $request->input('features'); 

        // Handling the selected image for uploading into specific path
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destinationPath = 'assets/images/uploads/products/';
            $filename = $file->getClientOriginalName().'_'.date('dmyHis').'.'.$file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);

            // Update product with image filename
            $product->image = $filename;
        }

        // Handling upload for multiple images
        if ($request->hasFile('images')) {
            $imageData = [];
        
            // Ensure we're dealing with an array
            $files = is_array($request->file('images')) ? $request->file('images') : [$request->file('images')];
        
            foreach ($files as $image) {
                // Store the image data
                $destinationPath = 'assets/images/uploads/products/';
                $filename = $image->getClientOriginalName().'_'.date('dmy').'.'.$image->getClientOriginalExtension();
                $image->move($destinationPath, $filename);
                $imageData[] = $filename;
            }
        
             // Serialize the array of image filenames
            $serializedImageData = serialize($imageData);

            // Save the serialized image data to the product
            $product->images = $serializedImageData;
        }
        // Save
        $product->save();

        // Attach features
        $product->features()->attach($request->features);
         
        // Redirect back with success message
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully');
    }

    public function editProduct(Product $product)
    {
        // Get the data for lists on dropdown
        $brands = Brand::all();
        $categories = Category::all();
        $features = Feature::all();

        // Pass the retrieved data and product details to the edit view
        return view('admin.products.edit', compact('product', 'brands', 'categories', 'features'));
    }

    public function updateProduct(Request $request, Product $product)
    {
        // Validate the request data 
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'product_model' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'description' => 'required|string',
            'regular_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            // 'SKU' => 'required|string',
            'stock_status' => 'required|string|max:255',
            'stock_on_hand' => 'required|integer',
            'featured' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
            'categories.*' => [
                'required',
                Rule::exists('categories', 'category_id'), 
            ],
            'brands.*' => [
                'required',
                Rule::exists('brands', 'brand_id'), 
            ],
            'features.*' => [
                'required',
                Rule::exists('features', 'feature_id'), 
            ],
        ], [
            'images.*.image' => 'The :attribute must be an image.',
            'images.*.mimes' => 'The :attribute must be a file of type: :values.',
            'images.*.max' => 'The :attribute may not be greater than :max kilobytes.',
        ]);
        
        // Message the user if they enter incorrect input
        if ($validator->fails()) {
            // If validation fails, redirect back with error message
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get the original name before any changes
        $originalName = $product->name;
        // Access the generateUniqueName function only if the slug has been updated
        $name = $request->input('name');
        if ($name !== $originalName) {
            $name = NameAndSlugHelper::generateUniqueName($name);
        } else {
            // Keep the original slug if it hasn't been changed
            $name = $originalName;
        }
        
        // Get the original slug before any changes
        $originalSlug = $product->slug;

        // Access the generateUniqueSlug function only if the slug has been updated
        $slug = $request->input('slug');
        if ($slug !== $originalSlug) {
            $slug = NameAndSlugHelper::generateUniqueSlug($slug);
        } else {
            // Keep the original slug if it hasn't been changed
            $slug = $originalSlug;
        }                   
        
        // Update product attributes
        $product->name = $name;
        $product->slug = $slug;
        $product->product_model = $request->input('product_model');
        $product->manufacturer = $request->input('manufacturer');
        $product->short_description = $request->input('short_description');
        $product->description = $request->input('description');
        $product->regular_price = $request->input('regular_price');
        $product->sale_price = $request->input('sale_price');
        $product->SKU = $request->input('SKU');
        $product->stock_status = $request->input('stock_status');
        $product->stock_on_hand = $request->input('stock_on_hand');
        $product->featured = $request->input('featured');
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $product->feature_id = $request->input('feature_id');

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destination = 'assets/images/uploads/products/'.$product->image;
            if(File::exists($destination)) 
            {
                File::delete($destination);
            }
            $extension = $file->getClientOriginalExtension();
            $filename = $file->getClientOriginalName().'_'.date('dmyHis').'.'.$extension;
            $file->move('assets/images/uploads/products/', $filename);
            $product->image = $filename;
        } 

        // Check if new images are being uploaded
        if ($request->hasFile('images')) {
            // Retrieve existing image filenames if available
            $existingImages = [];
            if (!empty($product->images)) {
                $existingImages = unserialize($product->images);
                if ($existingImages === false) {
                    // Handle invalid or empty data
                    \Log::error('Invalid or empty serialized data for product ID: ' . $product->id);
                    $existingImages = [];
                }
            }
        
            // Delete existing images from storage
            foreach ($existingImages as $existingImage) {
                $destination = 'assets/images/uploads/products/' . $existingImage;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
            }
        
            // Clear existing image data from product
            // $product->images = null;
        
            // Handle upload for new images
            $imageData = [];
            $files = is_array($request->file('images')) ? $request->file('images') : [$request->file('images')];
            foreach ($files as $image) {
                // Store the image data
                $destinationPath = 'assets/images/uploads/products/';
                $filename = $image->getClientOriginalName().'_'.date('dmy').'.'.$image->getClientOriginalExtension();
                $image->move($destinationPath, $filename);
                $imageData[] = $filename;
            }
        
            // Serialize the array of new image filenames
            $serializedImageData = serialize($imageData);
        
            // Save the serialized image data to the product
            $product->images = $serializedImageData;
        }

        // Save the updated product
        $product->save();
        
        // Attach new feature and detach the previous feature_id if the user selected new feature
        $product->features()->sync($request->input('feature_id'));

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    // Show the delete confirmation page
    public function showDeleteConfirmation(Product $product)
    {
        return view('admin.products.delete', compact('product'));
    }

    public function deleteProduct(Product $product)
    {
        // Delete the image from the file location
        $destination = 'assets/images/uploads/products/'.$product->image;
        if(File::exists($destination)) 
        {
            File::delete($destination);
        }

        // Check if the product has images
        if (!empty($product->images)) {
            // Unserialize the image data
            $imageArray = unserialize($product->images);

            // Check if the unserialization was successful and $imageArray is an array
            if (is_array($imageArray)) {
                // Iterate over each image
                foreach ($imageArray as $img) {
                    // Delete the file images from the file location
                    $destination = 'assets/images/uploads/products/' . $img;
                    if (File::exists($destination)) {
                        File::delete($destination);
                    }
                }
            } else {
                // Log an error if unserialization fails
                \Log::error('Failed to unserialize image data for product ID: ' . $product->id);
            }
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    
    /**
     * Check if a value is serialized.
     *
     * @param mixed $value Value to check.
     * @return bool True if serialized, false otherwise.
     */
    private function is_serialized($value)
    {
        // If it isn't a string, it isn't serialized.
        if (!is_string($value)) {
            return false;
        }
        $value = trim($value);
        if ('N;' == $value) {
            return true;
        }
        if (!preg_match('/^([adObis]):/', $value, $match)) {
            return false;
        }
        switch ($match[1]) {
            case 'a':
            case 'O':
            case 's':
                if (preg_match("/^{$match[1]}:[0-9]+:.*[;}]\$/s", $value)) {
                    return true;
                }
                break;
            case 'b':
            case 'i':
            case 'd':
                if (preg_match("/^{$match[1]}:[0-9.E-]+;\$/", $value)) {
                    return true;
                }
                break;
        }
        return false;
    }
}
