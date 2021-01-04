<?php

namespace App\Http\Controllers;

use App\Helpers\Tables\TableOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Datatables;


class OrdersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     parent::__construct();
    // }

    public function index()
    {

        return view('orders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('orders.create');
    }

    public function tableOrder(Request $request)
    {

        $tableOrder = TableOrder::initOrderDataTable($request, $this->limit, $this->skip);
        return $tableOrder;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'amzid' => 'required',
            'samid' => 'required',
            'quantity' => 'required',
            'samq' => 'required',
            'samp' => 'required',
            'same' => 'required',
            'pname' => 'required',
        ]);

        $order = Order::create($request->all() + ['user_id' => Auth::user()->id]);
        return redirect()->route('orders.index', $order);
    }
    public function ordersend(Request $request)
    {
       
        /*$order = DB::table('orders')->select('user_id')->where('same','=',$request->se);
        dd($order);*/
         $order = new order();

                $order->amzid = $request->aid;
                $order->samid = $request->sid;
                $order->quantity = $request->qu;
                $order->samq = $request->sq;
                $order->samp = $request->sp;
                $order->same = $request->se;
                $order->pname = $request->pn;
                $order->user_id = '2';
                $order->save();
        /*dd(json_encode($order));
        return Datatables::of($order)->make(true);
        return view('orders.index')->with('order', json_encode($order));*/
        if ($order)
        {
            echo "ok";
        }
        else
        {
            echo "Invaild record . Data not save in the database";
        }

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        
         return view('orders.index', compact('order', $order));
          // return Datatables::of($order)->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'amzid' => 'required',
            'samid' => 'required',
            'quantity' => 'required',
            'samq' => 'required',
            'samp' => 'required',
            'same' => 'required',
            'pname' => 'required',
        ]);
        if (Auth::user()->id == $request->user_id) {
            Order::find($id)->update($request->all());
            $request->session()->flash('message', 'Order updated successfully!');
        } else {
            return back();
        }
        return redirect('orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $order = Order::findOrFail($id);

        $order->delete();
        $request->session()->flash('message', 'Order deleted Successfully!');
        return redirect()->route('orders.index');
    }
}



         
