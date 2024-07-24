<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of users.
     *
     * This method returns the view for displaying a list of users.
     *
    */
    public function index()
    {
        return view("users.index");
    }

    public function showProfile()
    {
        $user = Auth::user();
        return view('profile', ['user' => $user]);
    }
}
