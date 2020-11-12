<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\{Portfolio, Category};
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function __construct()
    {
        return $this->middleware('checkAdmin');
    }
    
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;
        $portfolio_cats = Category::getCategoriesByType('portfolio');
        if (!empty($keyword)) {
            $portfolio = Portfolio::where('title', 'LIKE', "%$keyword%")
                ->orWhere('url', 'LIKE', "%$keyword%")
                ->orWhere('category', 'LIKE', "%$keyword%")
                ->orWhere('img', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $portfolio = Portfolio::paginate($perPage);
        }

        return view('admin.portfolio.index', compact('portfolio','portfolio_cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $portfolio_cats = Category::getCategoriesByType('portfolio');
        return view('admin.portfolio.create', compact('portfolio_cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'title' => 'required',
			'url' => 'required',
			'category' => 'required',
			'img' => 'required'
		]);
        $requestData = $request->all();
        $requestData['img'] = $this->fileUpload($request);
        Portfolio::create($requestData);

        return redirect('admin/portfolio')->with('flash_message', 'Portfolio added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        return view('admin.portfolio.show', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolio_cats = Category::getCategoriesByType('portfolio');
        return view('admin.portfolio.edit', compact('portfolio','portfolio_cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'title' => 'required',
			'url' => 'required',
			'category' => 'required',
		]);
        $requestData = $request->all();
        if(array_key_exists('img', $requestData))
        {
            $requestData['img'] = $this->fileUpload($request);
            $img = \DB::table('portfolios')->where('id',$id)->get();
            if(file_exists(public_path('/images/Portfolio/'.$img[0]->img)))
            {
                unlink(public_path('/images/Portfolio/'.$img[0]->img));
            }
        }
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->update($requestData);

        return redirect('admin/portfolio')->with('flash_message', 'Portfolio updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $img = \DB::table('portfolios')->where('id',$id)->get();
        if(file_exists(public_path('/images/Portfolio/'.$img[0]->img)))
        {
            unlink(public_path('/images/Portfolio/'.$img[0]->img));
        }
        Portfolio::destroy($id);

        return redirect('admin/portfolio')->with('flash_message', 'Portfolio deleted!');
    }

    public function fileUpload(Request $request)
    {
        $this->validate($request, [
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        $img             = $request->file('img');
        $imagename       = uniqid(time()) . '.' . $img->getClientOriginalExtension();
        $destinationPath = public_path('/images/Portfolio');
        
        $img->move($destinationPath, $imagename);

        return $imagename;
    }
}
