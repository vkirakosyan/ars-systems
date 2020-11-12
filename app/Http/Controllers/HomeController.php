<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Portfolio, Video};

class HomeController extends Controller
{
    /**
     * Show the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolio = $this->getPortfolio();
        $videos = $this->getVideos();
        return view('home', compact('portfolio','videos'));
    }

    private function getPortfolio()
    {
    	return Portfolio::get();
    }

    private function getVideos()
    {
        return Video::get();
    }
}