<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Changelog;

class ChangelogController extends Controller
{
    public function index(Request $request)
    {
        $changelogs = Changelog::orderBy('date_created', 'desc')->paginate(10); // Paginate with 10 records per page
        return view('admin.changelogs.index', compact('changelogs'));
    }

    public function changelogDetails(Changelog $changelog)
    {
        // Parse the message to get original and updated values
        $message = $changelog->message;
        $originalValues = [];
        $updatedValues = [];

        // Parse the message to extract old and new values
        preg_match_all("/([^:]+): ([^=]+) => ([^,]+)/", $message, $matches);

        // Construct original and updated values arrays
        foreach ($matches[1] as $index => $field) {
            $originalValues[$field] = trim($matches[2][$index]);
            $updatedValues[$field] = trim($matches[3][$index]);
        }

        return view('admin.changelogs.details', compact('originalValues', 'updatedValues'));
    }

    // Show the delete confirmation page
    public function showDeleteConfirmation(Changelog $changelog)
    {
        return view('admin.changelogs.delete', compact('changelog'));
    }

    // Delete the selected changelog
    public function deleteChangelog(Changelog $changelog)
    {
        // Delete the changelog
        $changelog->delete();

        return redirect()->route('admin.changelogs.index')
            ->with('success', 'Changelog deleted successfully.');
    }
}
