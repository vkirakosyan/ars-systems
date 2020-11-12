<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function __construct()
    {
    	return $this->middleware('checkAdmin');
    }

    public function index()
    {
        return view('admin.dashboard');
    }
}
