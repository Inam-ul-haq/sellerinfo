<?php

namespace App\Http\Controllers;

use App\Helpers\Tables\TableInStock;
use App\Models\Instock;
use Illuminate\Http\Request;
use KubAT\PhpSimple\HtmlDomParser;
use Illuminate\Support\Facades\Auth;
// use Auth;


class InStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {


        return view('instock.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('instock.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'url' => 'required',
            'product' => 'required',
            'store' => 'required',
            'status' => 'sometimes|required',
            'active' => 'sometimes|required',
        ]);

        $instock = Instock::create($request->all()+['user_id'=> Auth::user()->id]);
        return redirect()->route('instock.index', $instock);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $instock = Instock::find($id);
        if(Auth::user()->id == $instock->user_id){
        return view('instock.edit', compact('instock'));
        }
        else{
            return back();
        }
    }

    public function tableInStock(Request $request)
    {

        $tableOrder = TableInStock::initinstockDataTable($request, $this->limit, $this->skip);
        return $tableOrder;
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
            'url' => 'required',
            'product' => 'required',
            'store' => 'required',
            'status' => 'sometimes|required',
            'active' => 'sometimes|required',
        ]);

        $status = 0;
        if($request->status == "on")
        {
            $status = 1;
        }else{
            $status = 0;
        }

        $active = 0;
        if($request->active == "on")
        {
            $active = 1;
        }else{
            $active = 0;
        }

        Instock::find($id)->update($request->except('status','active')+['status'=>$status,'active'=>$active]);

        $request->session()->flash('message', 'Stock updated successfully!');
        return redirect()->route('instock.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {

        $instock = Instock::findOrFail($id);
        if(Auth::user()->id == $instock->user_id){
        $instock->delete();
        $request->session()->flash('message', 'Stock deleted Successfully!');
        }else{
            return back();
        }
        return redirect()->route('instock.index');
    }
    public static function checkStock($url)
    {
        $dom = HtmlDomParser::file_get_html($url );

        $spans = $dom->find('button[class=sc-btn sc-btn-primary sc-btn-block sc-pc-action-button sc-pc-add-to-cart]');
       if(count($spans) > 0){
        if (strpos($spans[0], 'disabled') !== false) {
            return '0'; //out of stock
        } else {
            return '1'; //in stock
        }
    }
    }

    public static function sendAlert($url, $product){
        $content      = array(
                "en" => 'Back in Stock Alert'
            );
            $hashes_array = array();
            array_push($hashes_array, array(
                "id" => "stock-available",
                "title" => "Back in Stock",
                "text" => $product,
                "icon" => "https://i.imgur.com/teb2ds5.png",
                "url" => $url
            ));


            $fields = array(
                'app_id' => "4a0fbce4-ddf1-47fb-8739-aa2ed1082767",
                'included_segments' => array(
                    'All'
                ),
                'data' => array(
                    "foo" => "bar"
                ),
                'contents' => $content,
                'web_buttons' => $hashes_array
            );

            $fields = json_encode($fields);
            print("\nJSON sent:\n");
            print($fields);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8',
                'Authorization: Basic Y2UxM2Y4ODktZWJkNC00ZmJhLTgzMDItYTNiMmU3NmQ0ODJi'
            ));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

            $response = curl_exec($ch);
            curl_close($ch);


        }
}
