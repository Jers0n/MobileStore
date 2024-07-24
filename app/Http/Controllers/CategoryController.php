<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use App\Helpers\NameAndSlugHelper;

class CategoryController extends Controller
{
    // List all the categories
    public function listCategories()
    {
        $categories = Category::orderBy('name', 'ASC')->paginate(5);
        return view('admin.categories.index', compact('categories'));
    }
    
    // Show the detail of the selected category
    public function detailCategory(Category $category)
    {
        $category->loadCount('products');

        return view('admin.categories.details', compact('category'));
    }

    // Redirect to the create form category page
    public function createCategory()
    {
        return view('admin.categories.create');
    }

    // Adding new category 
    public function storeNewCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
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

        // Creating category instance 
        $category = new Category;
        $category->name = $name;
        $category->slug = $slug;

        // Save category 
        $category->save();
    
        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    // Redirect to the edit form category page
    public function editCategory(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // Updating category details
    public function updateCategory(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255' . $category->category_id . ',category_id',
        ]);

        // Message the user if they enter incorrect input
        if ($validator->fails()) {
            // If validation fails, redirect back with error message
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get the original slug before any changes
        $originalSlug = $category->slug;

        // Access the generateUniqueSlug function only if the slug has been updated
        $slug = $request->input('slug');
        if ($slug !== $originalSlug) {
            $slug = NameAndSlugHelper::generateUniqueSlug($slug);
        } else {
            // Keep the original slug if it hasn't been changed
            $slug = $originalSlug;
        }

        // Get the original name before any changes
        $originalName = $category->name;
        // Access the generateUniqueName function only if the name has been updated
        $name = $request->input('name');
        if ($name !== $originalName) {
            $name = NameAndSlugHelper::generateUniqueName($name);
        } else {
            // Keep the original slug if it hasn't been changed
            $name = $originalName;
        }

        $category->name = $name; 
        $category->slug = $slug;

        // Updating the category
        $category->update();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully.');
    }

    // Show the delete confirmation page
    public function showDeleteConfirmation(Category $category)
    {
        return view('admin.categories.delete', compact('category'));
    }

    // Delete the selected category
    public function deleteCategory(Category $category)
    {
        // Check if the category is associated to the products 
        if ($category->products()->exists()) {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Unable to delete category ID: ' .  $category->category_id . ', Category Name: '.  $category->name .  '. Products linked to this category. Please remove association before deleting again.');
        }

        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
