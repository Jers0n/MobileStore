<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\AuthAdmin;

class AdminController extends Controller
{
    /**
     * Display a listing of administrators.
     *
     * This method returns the view for displaying a list of administrators.
     *
    */

    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function index()
    {
        return view('admin.index');
    }
}
