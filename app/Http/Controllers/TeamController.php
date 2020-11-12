<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamController extends Controller
{
    /**
     * Show the team page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$team = Team::orderBy('sort_position','asc')->get();		
        return view('team', compact('team'));
    }
}
