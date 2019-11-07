<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Funlocs;
use App\Models\Levels;
use Illuminate\Http\Request;

class FunlocsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       
        $contents = [
            'funlocs' => Funlocs::with(['levels'])->get(),  
          ];
          // dd($contents);
  
          $pagecontent = view('funlocs.index',$contents);
  
          // masterpage
          $pagemain = array(
              'title' => 'Funlocs',
              'menu' => 'rak',
              'submenu' => 'funlocs',
              'pagecontent' => $pagecontent
          );
          return view('masterpage', $pagemain);
    }
    public function create_page()
    {
        // ini buat manggil relasi
        $levels = Levels::all();
        // return $levels;
        $contents = [
            //'items' => Items::with('categories')->get(),
            'levels' => $levels,
                'funlocs' => Funlocs::all(),
        ];

        $pagecontent = view('funlocs.create',$contents);

        //masterpage
        $pagemain = array(
        'title' => 'Funlocs',
        'menu' => 'funlocs',
        'submenu' => 'funlocs',
        'pagecontent' => $pagecontent,
        );

        return view('masterpage', $pagemain);
    }
    public function save_page(Request $request)
    {
        // return $request->all();
        $request->validate([
            'cabang' => 'required',
            'number' => 'required',
            'description' => 'required',
        ]);

        $saveFunlocs = new Funlocs;
        $saveFunlocs->cabang = $request->cabang;
        $saveFunlocs->idlevels = $request->idlevels;
        $saveFunlocs->number = $request->number;
        $saveFunlocs->description = $request->description;
        $saveFunlocs->save();
        return redirect('funlocs')->with('status_success','Created funlocs');
    }
    public function update_page(Funlocs $funloc)
    {
        $contents = [
            'funlocs' => Funlocs::find($funloc->idfunlocs)
        ];
        // return $content;
        $pagecontent = view('funlocs.update',$contents);
         //masterpage
         $pagemain = array(
            'title' => 'Funlocs',
            'menu' => 'funlocs',
            'submenu' => 'funlocs',
            'pagecontent' => $pagecontent,
         );
         return view('masterpage', $pagemain);

    }
    public function update_save(Request $request,Funlocs $funloc)
    {
        $request->validate([
            'cabang' => 'required',
            'number' => 'required',
            'description' => 'required',
        ]);

        $updateFunlocs = Funlocs::find($funloc->idfunlocs);
        $updateFunlocs->cabang = $request->cabang;
        $updateFunlocs->number = $request->number;
        $updateFunlocs->description = $request->description;
        $updateFunlocs->save();
        return redirect('funlocs')->with('status_success','Update funlocs');
    }
    public function delete(Funlocs $funloc)
    {
        $deleteFunlocs = Funlocs::find($funloc->idfunlocs);
        $deleteFunlocs->delete();
        return redirect('funlocs')->with('status_success','Deleted funlocs');
    }
}
