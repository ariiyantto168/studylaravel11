<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Levels;
use Illuminate\Http\Request;

class LevelsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('admin');
    }

    public function index()
    {
        $contents = [
          'levels' => Levels::all(),  
        ];
        // dd($contents);

        $pagecontent = view('levels.index',$contents);

        // masterpage
        $pagemain = array(
            'title' => 'Levels',
            'menu' => 'rak',
            'submenu' => 'levels',
            'pagecontent' => $pagecontent
        );
        return view('masterpage', $pagemain);
    }
    public function create_page()
    {
        $pagecontent = view('levels.create');

        //masterpage
      $pagemain = array(
        'title' => 'Levels',
        'menu' => 'levels',
        'submenu' => 'levels',
        'pagecontent' => $pagecontent,
    );

        return view('masterpage', $pagemain);
    }

    public function save_page(Request $request)
    {
        // return $request->all();
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'description' => 'required',
            'created_by' => 'required',
            'status' => ''
        ]);

        // active 
        $active = FALSE;
        if ($request->has('active')) {
            $active = TRUE;
        }

        $saveLevels = new Levels;
        $saveLevels->code = $request->code;
        $saveLevels->name = $request->name;
        $saveLevels->description = $request->description;
        $saveLevels->created_by = $request->created_by;
        $saveLevels->active = $active;
        $saveLevels->save();
        return redirect('levels')->with('status_success','Created levels'); 
    }

    public function update_page(Levels $level)
    {
        $contents = [
            'level' => Levels::find($level->idlevels)
        ];

        $pagecontent = view('levels.update',$contents);

        // masterpage
        $pagemain = array(
            'title' => 'Levels',
            'menu' => 'levels',
            'submenu' => 'levels',
            'pagecontent' => $pagecontent,
        );
        return view('masterpage', $pagemain);
    }

    public function update_save(Request $request,Levels $level)
    {
        // return $request->all();
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'description' => 'required',
            'created_by' => 'required',
            'status' => ''
        ]);

        // active 
        $active = FALSE;
        if ($request->has('active')) {
            $active = TRUE;
        }

        $updateLevels = Levels::find($level->idlevels);
        $updateLevels->code = $request->code;
        $updateLevels->name = $request->name;
        $updateLevels->description = $request->description;
        $updateLevels->created_by = $request->created_by;
        $updateLevels->active = $active;
        $updateLevels->save();
        return redirect('levels')->with('status_success','Updated levels');
    }

    public function delete(Levels $level)
    {
        $deleteLevels = Levels::find($level->idlevels);

        $deleteLevels->delete();
        return redirect('levels')->with('status_success','Deleted levels');
    }
}
