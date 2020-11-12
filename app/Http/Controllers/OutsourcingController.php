<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OutsourcingController extends Controller
{
    /**
     * Show the outsourcing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('outsourcing');
    }
}
