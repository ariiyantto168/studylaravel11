<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\User;
use App\Models\Items;
use App\Models\OrdersDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contents = [
            'orders' => Orders::all(),
        ];

        $pagecontent = view('orders.index',$contents );

        // masterpage
        $pagemain = array(
            'title' => 'Orders',
            'menu' => 'orders',
            'submenu' => '',
            'pagecontent' => $pagecontent
        );
        
        return view('masterpage', $pagemain);
    }

    public function create_page()
    {
        // return Items::all();
        $contents = [
            'items' => Items::where('active', true)->get(), 
        ];

        // return $contents;

        $pagecontent = view('orders.create',$contents);

        //masterpage
      $pagemain = array(
        'title' => 'Orders',
        'menu' => 'orders',
        'submenu' => '',
        'pagecontent' => $pagecontent,
    );

    return view('masterpage', $pagemain);

    }

    public function save_page(Request $request)
    {
        // return $this->test();
        // die;

        $request->validate([
            'due_date',
            'description' => 'required',
        ]);
        // return $request->all();

        $quantity = $request->quantity;
        $items = $request->iditems;
        $itm = count($items);

        for ($i=0; $i < $itm; $i++) {
            if ($items[$i] == 0) {
             return redirect()->back()->with('status_error', 'Items empty');
            }elseif ($quantity[$i] == 0) {
             return redirect()->back()->with('status_error', 'Quantity empty');
            }
         }

      $saveOrders = new Orders;
      $saveOrders->code = $this->get_code();
      $saveOrders->date_orders = date('Y-m-d H:i:s');
      $saveOrders->due_date = $request->due_date;
      $saveOrders->idusers = Auth::user()->idusers;
      $saveOrders->description = $request->description;
      $saveOrders->status = 'p';
      $saveOrders->save();
      //
      for ($i=0; $i < $itm  ; $i++) {
        $saveOrdersDetails = new OrdersDetails;
        $saveOrdersDetails->idorders = $saveOrders->idorders;
        $saveOrdersDetails->iditems = $items[$i];
        $saveOrdersDetails->quantity = $quantity[$i];
        $saveOrdersDetails->save();

      }
      return redirect('orders')->with('status_success','Orders updated');

    }

    public function update_page(Orders $order)
    {
        // return $order->all();
        $orders = Orders::with([
            'order_details' => function($od){
                $od->with('items');
            }
        ])->where('idorders',$order->idorders)
          ->first();
        //   return $orders;
        // return $order->idorders;

        // order_details dapat di model Orders function order_details
        // items dapat di model OrdersDetails function items
        // $ade = Orders::with([
        //     'order_details' => function($ar){
        //         $ar->with('items');
        //     }
        // ])->where('idorders',$order->idorders)
        // ->first();
        // return $ade;

        $contents = [
            'order' => $orders,
            'items' => Items::where('active', true)->get(), 
        ];

        // return $contents;

        $pagecontent = view('orders.update',$contents);

        //masterpage
      $pagemain = array(
        'title' => 'Orders',   
        'menu' => 'orders',
        'submenu' => '',
        'pagecontent' => $pagecontent,
    );

    return view('masterpage', $pagemain);

    }

    public function update_save(Request $request,Orders $order)
    {
        // return $request->all();
        // return $this->get_code();
        // die;

        $request->validate([
            'due_date',
            'description' => 'required',
        ]);
        $order_details = $request->idorderdetails;
        $quantity = $request->quantity;
        $items = $request->iditems;
        $itm = count($items);

        for ($i=0; $i < $itm; $i++) {
            if ($items[$i] == 0) {
             return redirect()->back()->with('status_error', 'Items empty');
            }elseif ($quantity[$i] == 0) {
             return redirect()->back()->with('status_error', 'Quantity empty');
            }
         }

      $saveOrders = Orders::find($order->idorders);
      $saveOrders->date_orders = date('Y-m-d H:i:s');
      $saveOrders->due_date = $request->due_date;
      $saveOrders->description = $request->description;
      $saveOrders->save();
// new dapat dari update.blade.php
      for ($i=0; $i < $itm  ; $i++) {
        //   jika ada penambahan maka akan langsung melewati else
          if($order_details[$i] == 'new'){
            $saveOrdersDetails = new OrdersDetails;      
            $saveOrdersDetails->idorders = $saveOrders->idorders;
            // jika tidak ada penambahan maka langsung ke else untuk data lama
          }else {
            $saveOrdersDetails = OrdersDetails::find($order_details[$i]);     
          }
        $saveOrdersDetails->iditems = $items[$i];
        $saveOrdersDetails->quantity = $quantity[$i];
        $saveOrdersDetails->save();
        }
        return redirect('orders')->with('status_success','Orders updated');
    }
    public function view_orders()
    {
        $contents = [
            'orders' => Orders::all(),
        ];

        $pagecontent = view('orders.view',$contents );

        // masterpage
        $pagemain = array(
            'title' => 'Orders',
            'menu' => 'orders',
            'submenu' => '',
            'pagecontent' => $pagecontent
        );
        
        return view('masterpage', $pagemain);
    }

    protected function get_code()
  	{
  		$date_ym = date('ym');
          $date_between = [date('Y-m-01 00:00:00'), date('Y-m-t 23:59:59')];
        

  		$dataOrders = Orders::select('code')
  			->whereBetween('created_at',$date_between)
  			->orderBy('code','desc')
  			->first();
            //   return $dataOrders;
            //      die;
  		if(is_null($dataOrders)) {
  			$nowcode = '00001';
  		} else {
  			$lastcode = $dataOrders->code;
  			$lastcode1 = intval(substr($lastcode, -5))+1;
  			$nowcode = str_pad($lastcode1, 5, '0', STR_PAD_LEFT);
  		}

  		return 'PO-'.$date_ym.'-'.$nowcode;
      }
      
      public function test()
      {
          return 'ari';
      }
}
