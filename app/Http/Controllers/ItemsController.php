<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\User;
use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class ItemsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('admin');
    }

    public function index()
    {
        $content = [
            // // ini buat apa ya
            // 'categories' function dr model Items
            'items' => Items::with(['categories'])->get(),
        ];

        // return $contents;
        // dd($contents);
        $pagecontent = view('items.index',$content);

        // masterpage
        $pagemain = array(
            'title' => 'Master Items',
            'menu' => 'master',
            'submenu' => 'items',
            'pagecontent' => $pagecontent
        );

        return view('masterpage', $pagemain);
    }

    public function create_page()
    {
        // ini model Categories di panggil
        $categories = Categories::all();
        $content = [
            //'items' => Items::with('categories')->get(),
            'categories' => $categories,
                'items' => Items::all(),
        ];

        // return $categories;

        $pagecontent = view('items.create',$content);
        // materpage 
        $pagemain = array(
            'title' => 'Items',
            'menu' => 'items',
            'submenu' => 'items',
            'pagecontent' => $pagecontent
        );
        return view('masterpage', $pagemain);
    }

    public function save_page(Request $request)
    {
        // return $request->all();
        $request->validate([
            'nameitems' => 'required',
            'unit' => 'required',
            'brand' => 'required',
            'status' => ''
        ]);

        //active
        $active = FALSE;
        if($request->has('active')) {
            $active = TRUE;
        }

        $saveItems = New Items;
        $saveItems->nameitems = $request->nameitems;
        $saveItems->idcategories = $request->idcategories;
        $saveItems->unit = $request->unit;
        $saveItems->brand = $request->brand;
        $saveItems->active = $active;
        $saveItems->save();
        return redirect('items')->with('status_success','Created categories'); 
    }
    public function update_page(Items $items)
    {
        $categories = Categories::all();
        $content = [
            //'items' => Items::with('categories')->get(),
            'categories' => $categories,
            'items' => Items::find($items->iditems)
        ];
        
        // return $content;

        $pagecontent = view('items.update',$content);

        // masterpage
        $pagemain = array(
            'title' => 'Items',
            'menu' => 'items',
            'submenu' => 'items',
            'pagecontent' => $pagecontent,
        );
        return view('masterpage', $pagemain);
    }

    public function update_save(Request $request,Items $items)
    {
        // return $request->all();

        $request->validate([
            'nameitems' => 'required',
            'unit' => 'required',
            'brand' => 'required',
            'active' => ''
        ]);

        // active
        $active = FALSE;
        if($request->has('active')) {
            $active = TRUE;
        }
        $updateItems = Items::find($items->iditems);
        $updateItems->nameitems = $request->nameitems;
        $updateItems->idcategories = $request->idcategories;
        $updateItems->unit = $request->unit;
        $updateItems->brand = $request->brand; 
        $updateItems->active = $active;
        $updateItems->save();
        return redirect('items')->with('status_success','Update items');
       
    }

    public function delete(Items $items)
    {
        $deleteItems = Items::find($items->iditems);

        $deleteItems->delete();
        return redirect('items')->with('status_success','Deleted items');
    }

    
}
