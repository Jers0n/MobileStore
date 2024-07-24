<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;
use Illuminate\Support\Facades\Validator;

class FeatureController extends Controller
{
    // List all the features
    public function listFeatures()
    {
        $features = Feature::with(['products' => function ($query) {
            $query->select('name', 'slug', 'brand_id'); // Select only specific columns from the product table
            $query->with(['brand' => function ($query) {
                $query->select('brand_id', 'name'); // Select specific columns from the brand table
            }]);
        }])->paginate(15);
        // $features = Feature::orderBy('feature_id', 'ASC')->paginate(15);
        return view('admin.features.index', compact('features'));
    }

    // List selected feature
    public function detailFeature(Feature $feature)
    {
        $feature->loadCount('products');

        return view('admin.features.details', compact('feature'));
    }

    // Redirect to the create form feature page
    public function createFeature()
    {
        return view('admin.features.create');
    }

    // Adding new feature 
    public function storeNewFeature(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'weight' => 'required|numeric',
            'dimensions' => 'required|string',
            'OS' => 'required|string|max:255',
            'screensize' => 'required|numeric',
            'resolution' => 'required|string|max:255',
            'cpu' => 'required|string|max:255',
            'ram' => 'required|string|max:255',
            'storage' => 'required|string|max:255',
            'battery' => 'required|integer|min:0',
            'rear_camera' => 'required|string|max:255',
            'front_camera' => 'required|string|max:255',
        ]);

        // Message the user if they enter incorrect input
        if ($validator->fails()) {
            // If validation fails, redirect the user to the error message
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
         // Creating new feature to the database
        $feature = Feature::create([
            'weight' => $request->weight,
            'dimensions' => $request->dimensions,
            'OS' => $request->OS,
            'screensize' => $request->screensize,
            'resolution' => $request->resolution,
            'CPU' => $request->cpu,
            'RAM' => $request->ram,
            'storage' => $request->storage,
            'battery' => $request->battery,
            'rear_camera' => $request->rear_camera,
            'front_camera' => $request->front_camera,
        ]);

    
        return redirect()->route('admin.features.index')->with('success', 'Feature created successfully.');
    }

    // Redirect to the edit form feature page
    public function editFeature(Feature $feature)
    {
        return view('admin.features.edit', compact('feature'));
    }

    // Updating feature details
    public function updateFeature(Request $request, Feature $feature)
    {
        $validator = Validator::make($request->all(), [
            'weight' => 'required|numeric',
            'dimensions' => 'required|string',
            'OS' => 'required|string|max:255',
            'screensize' => 'required|numeric',
            'resolution' => 'required|string|max:255',
            'cpu' => 'required|string|max:255',
            'ram' => 'required|string|max:255',
            'storage' => 'required|string|max:255',
            'battery' => 'required|integer|min:0',
            'rear_camera' => 'required|string|max:255',
            'front_camera' => 'required|string|max:255',
        ]);

        // Message the user if they enter incorrect input
        if ($validator->fails()) {
            // If validation fails, redirect the user to the error message
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $feature->weight = $request->input('weight');
        $feature->dimensions = $request->input('dimensions');
        $feature->OS = $request->input('OS');
        $feature->screensize = $request->input('screensize');
        $feature->resolution = $request->input('resolution');
        $feature->cpu = $request->input('cpu');
        $feature->ram = $request->input('ram');
        $feature->storage = $request->input('storage');
        $feature->battery = $request->input('battery');
        $feature->rear_camera = $request->input('rear_camera');
        $feature->front_camera = $request->input('front_camera');

        $feature->save();

        return redirect()->route('admin.features.index')
            ->with('success', 'Feature updated successfully.');
    }

    // Show the delete confirmation page
    public function showDeleteConfirmation(Feature $feature)
    {
        return view('admin.features.delete', compact('feature'));
    }

    // Delete the selected feature
    public function deleteFeature(Feature $feature)
    {
         // Check if the feature is associated to the products 
         if ($feature->products()->exists()) {
            return redirect()->route('admin.features.index')
                ->with('error', 'Unable to delete feature ID: ' .  $feature->feature_id . ' Products linked to this feature. Please remove association before deleting again.');
        }

        // Delete the feature
        $feature->delete();

        return redirect()->route('admin.features.index')
            ->with('success', 'Feature deleted successfully.');
    }
}
