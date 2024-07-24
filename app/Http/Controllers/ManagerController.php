<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function index()
    {
        return view("manager.index");
    }

    // Show form to create admin user
    public function createAdmin()
    {
        return view("manager.admins.create");
    }

    // Create admin user accessible by manager only
    public function storeNewAdmin(Request $request)
    {
        // Check if the current user is a manager
        if (auth()->user()->utype === "MGR") {
            // Validate request data
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
                'user_type' => 'required|string|in:admin',
            ]);

            // Create admin user
            $admin = new User();
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->password = Hash::make($request->password);
            $admin->utype = 'ADM'; // 'ADM' for admin users
            $admin->save();

            // Redirect or return success response
            return redirect()->route('manager.admins.index')->with('success', 'Admin user created successfully');
        } else {
            // If not a manager, return unauthorized error
            abort(403, 'Unauthorized');
        }
    }

    // List all admin users
    public function listAdmins()
    {
        $admins = User::where('utype', 'ADM')->paginate(5);
        return view("manager.admins.index", compact('admins'));
    }

    // Show details of a specific admin user
    public function showAdmin($id)
    {
        $admin = User::findOrFail($id);
        return view("manager.admins.view", compact('admin'));
    }

    public function editAdmin($id)
    {
        // Retrieve the admin user by ID and pass it to the view
        $admin = User::findOrFail($id);
        return view('manager.admins.edit', compact('admin'));
    }

    // Update details of a specific admin user
    public function updateAdmin(Request $request, $id)
    {
        // Find the admin user by ID
        $admin = User::findOrFail($id);

        // Check if the current user is a manager
        if (auth()->user()->utype === "MGR") {
            // Validate request data
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $admin->user_id . ',user_id', // Ensure unique email excluding current admin
                'password' => 'required|min:8', // Allow password to be nullable for updating
                'utype' => 'required|string|in:ADM', // Admin only 
            ]);

            // Update admin user details
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->utype = $request->utype;
            if ($request->has('password')) {
                $admin->password = Hash::make($request->password);
            }
            $admin->save();

            // Redirect or return success resp  onse
            return redirect()->route('manager.admins.index')->with('success', 'Admin user updated successfully');
        } else {
            // If not a manager, return unauthorized error
            abort(403, 'Unauthorized');
        }
    }

    public function showDeleteConfirmation($id)
    {
        $admin = User::findOrFail($id);
        return view('manager.admins.delete', compact('admin'));
    }

    // Delete a specific admin user
    public function deleteAdmin($id)
    {
        // Find the admin user by ID
        $admin = User::findOrFail($id);

        // Check if the current user is a manager
        if (auth()->user()->utype === "MGR") {
            // Delete the admin user
            $admin->delete();

            // Redirect to the admins index page
            // return response()->json(['message' => 'Admin user deleted successfully']);
            return redirect()->route('manager.admins.index')
            ->with('success', 'Admin deleted successfully.');
        } else {
            // If not a manager, return unauthorized error
            abort(403, 'Unauthorized');
        }
    }
}
