<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\{Team, Category};
use Illuminate\Http\Request;

class TeamController extends Controller
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
        $categories = Category::getCategoriesByType('team');
        if (!empty($keyword)) {
            $team = Team::where('first_name', 'LIKE', "%$keyword%")
                ->orWhere('last_name', 'LIKE', "%$keyword%")
                ->orWhere('position', 'LIKE', "%$keyword%")
                ->orWhere('category', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orderBy('sort_position','asc')
                ->paginate($perPage);
        } else {
            $team = Team::orderBy('sort_position','asc')->paginate($perPage);
        }

        return view('admin.team.index', compact('team','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::getCategoriesByType('team');
        return view('admin.team.create', compact('categories'));
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
			'first_name' => 'required',
			'last_name' => 'required',
			'position' => 'required',
			'category' => 'required',
			'image' => 'required'
		]);
        $firstPos    = Team::orderBy('sort_position','desc')->first();
        $requestData = $request->all();
        $requestData['image'] = $this->fileUpload($request);
        $requestData['sort_position'] = !is_null($firstPos) ? $firstPos->sort_position+1 : 1;
        Team::create($requestData);

        return redirect('admin/team')->with('flash_message', 'Team added!');
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
        $team = Team::findOrFail($id);

        return view('admin.team.show', compact('team'));
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
        $team = Team::findOrFail($id);
        $categories = Category::getCategoriesByType('team');
        return view('admin.team.edit', compact('team','categories'));
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
			'first_name' => 'required',
			'last_name' => 'required',
			'position' => 'required',
			'category' => 'required',
		]);
        $requestData = $request->all();
        $img = \DB::table('teams')->where('id',$id)->get();
        if(array_key_exists('image', $requestData) && $img)
        {
            if(file_exists(public_path('/images/Team/'.$img[0]->image)))
            {
                unlink(public_path('/images/Team/'.$img[0]->image));
            }
            if(file_exists(public_path('/images/Team/'.strstr($img[0]->image,'.',true).'_hover'.strstr($img[0]->image,'.'))))
            {
                unlink(public_path('/images/Team/'.strstr($img[0]->image,'.',true).'_hover'.strstr($img[0]->image,'.')));
            }
            $requestData['image'] = $this->fileUpload($request);
        }
        $team = Team::findOrFail($id);
        $team->update($requestData);

        return redirect('admin/team')->with('flash_message', 'Team updated!');
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
        $img = \DB::table('teams')->where('id',$id)->get();
        if(file_exists(public_path('/images/Team/'.$img[0]->image)))
        {
            unlink(public_path('/images/Team/'.$img[0]->image));
        }
        if(file_exists(public_path('/images/Team/'.strstr($img[0]->image,'.',true).'_hover'.strstr($img[0]->image,'.'))))
        {
            unlink(public_path('/images/Team/'.strstr($img[0]->image,'.',true).'_hover'.strstr($img[0]->image,'.')));
        }
        Team::destroy($id);

        return redirect('admin/team')->with('flash_message', 'Team deleted!');
    }

    public function fileUpload(Request $request)
    {
        $this->validate($request, [
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        $imgs     = $request->file('image');
        $original = '';
        foreach ($imgs as $key => $img) {
            $imagename       = $img->getClientOriginalName();
            $destinationPath = public_path('/images/Team');
            if(!strpos($imagename,'hover'))
            {
                $original = $img->getClientOriginalName();
            }
            
            $img->move($destinationPath, $imagename);
        }

        return $original;
    }

    public function sortMembers(Request $request)
    {

       if(isset($request->obj))
       {
        foreach ($request->obj as $key => $value) 
        {
           Team::where('id',$key)->update(['sort_position' => $value]);
        }
        return 'Successfully Updated';
       }

    }
}
