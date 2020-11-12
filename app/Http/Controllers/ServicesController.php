<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Service, ServiceType};

class ServicesController extends Controller
{
    /**
     * Show the services page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::get();
        return view('services', compact('service'));
    }
}