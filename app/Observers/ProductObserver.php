<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Changelog;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ProductObserver
{
    public function created(Product $product)
    {
        $user = auth()->user();
        $message = "{$user->name} created product '{$product->name}'";
        Changelog::create([
            'message' => $message,
            'date_created' => now(),
            'date_last_modified' => now(),
            'user_id' => $user->user_id,
            'product_id' => $product->product_id,
        ]);
    }

    public function updated(Product $product)
    {
        // $user = auth()->user();
        // $original = $product->getOriginal(); // Get original values before update
        // $changes = $product->getChanges(); // Get changes made during update
        
        // if (!empty($changes)) {
        //     // Initialize an array to store the details of edited fields
        //     $editedFields = [];

        //     // Loop through the changes and compare with original values
        //     foreach ($changes as $field => $newValue) {
        //         $oldValue = Arr::get($original, $field);

        //         // If the value has changed, add it to the edited fields array
        //         if ($newValue !== $oldValue) {
        //             $editedFields[$field] = [
        //                 'old' => $oldValue,
        //                 'new' => $newValue,
        //             ];
        //         }
        //     }
        // }

        // // Construct the message based on edited fields
        // $message = "{$user->name} updated product '{$product->name}'";
        // if (!empty($editedFields)) {
        //     $message .= ' (';
        //     $editedFieldsList = [];
        //     foreach ($editedFields as $field => $values) {
        //         $editedFieldsList[] = "$field: {$values['old']} => {$values['new']}";
        //     }
        //     $message .= implode(', ', $editedFieldsList);
        //     $message .= ')';
        // }

        // // Create Changelog entry with the constructed message
        // Changelog::create([
        //     'message' => $message,
        //     'date_created' => now(),
        //     'date_last_modified' => now(),
        //     'user_id' => $user->user_id,
        //     'product_id' => $product->product_id,
        // ]);
        $user = auth()->user();
    $original = $product->getOriginal(); // Get original values before update
    $changes = $product->getChanges(); // Get changes made during update
    
    if (!empty($changes)) {
        // Initialize an array to store the details of edited fields
        $editedFields = [];

        // Loop through the changes and compare with original values
        foreach ($changes as $field => $newValue) {
            $oldValue = Arr::get($original, $field);

            // If the value has changed, add it to the edited fields array
            if ($newValue !== $oldValue) {
                $editedFields[$field] = [
                    'old' => $oldValue,
                    'new' => $newValue,
                ];
            }
        }

        // Construct the message based on edited fields
        $message = "{$user->name} updated product '{$product->name}'";
        if (!empty($editedFields)) {
            $message .= ' (';
            $editedFieldsList = [];
            foreach ($editedFields as $field => $values) {
                $editedFieldsList[] = "$field: {$values['old']} => {$values['new']}";
            }
            $message .= implode(', ', $editedFieldsList);
            $message .= ')';
        }

        // Create Changelog entry with the constructed message
        Changelog::create([
            'message' => $message,
            'date_created' => now(), // Use the same date as when the changelog entry is created
            'date_last_modified' => $product->updated_at, // Use the product's updated date
            'user_id' => $user->user_id,
            'product_id' => $product->product_id,
        ]);
    }
    }

    public function deleted(Product $product)
    {
        $user = auth()->user();
        $message = "{$user->name} deleted product '{$product->name}'";

        // Disable foreign key constraint checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Create changelog entry
        $changelog = Changelog::create([
            'message' => $message,
            'date_created' => now(),
            'date_last_modified' => now(),
            'user_id' => $user->user_id,
            'product_id' => $product->product_id,
        ]);

        // Re-enable foreign key constraint checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Delete the product
        $product->delete();
    }
}
