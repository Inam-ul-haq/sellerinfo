<?php


namespace App\Helpers\Tables;

use App\Helpers\Tables\InitDataTable;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class TableOrder
{

    public static function initOrderDataTable($request, $limit, $skip)
    {

        if ($request->has('length')) {
            $limit = (int) $request->length;
        }
        if ($request->has('start')) {
            $skip = (int) $request->start;
        }
        $search = $request->search['value'] ?? '';
        $orders = Order::query();

        $orders->where('user_id', Auth::user()->id);
        $orders->orderBy('id', 'DESC');



        if (!empty($request->search['value'])) {

            $columns = ['amzid', 'samid', 'samq', 'quantity', 'same', 'pname'];
            $orders = InitDataTable::refactorWhereClauseForDataTable($orders, $columns, $search);
        }
        // Table Sorting

        if (!empty($request->order[0]['dir'])) {

            $colname = $request->columns[$request->order[0]['column']]['data'];

            $orders = $orders->orderBy($colname, $request->order[0]['dir']);
        }
        $orders->where('user_id', Auth::user()->id);
        $countIt = $orders->count();
        $orders = $orders->skip($skip)
            ->take($limit)
            ->get()
            ->map(function ($order) {
                $editbutton = '';
                $editbutton = '<a data-toggle="kt-tooltip" data-placement="left" title="View" class="btn btn-sm btn-clean btn-icon btn-icon-md" href="' . route('orders.edit', $order->id) . '"><i class="fa fa-pen" aria-hidden="true"></i></a>';
                $delbutton = '';

                $delbutton = '<a href="' . route('orders.destroy', $order->id) . '" data-placement="left" title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md"  ><i class="la la-trash"></i></button>';



                $stractions = $editbutton . $delbutton;


                return [


                    'amzid' => $order->amzid,
                    'samid' =>  $order->samid,
                    'quantity' => $order->quantity,
                    'samq' =>  $order->samq,
                    'samp' =>  $order->samp,
                    'same' => $order->same,
                    'pname' =>  $order->pname,
                    'created_at' => setDateTimeFormat($order->created_at),
                    'actions' => $stractions
                ];
            });
        if (count($orders) == 0) {

            $orders = [[

                'amzid' => 'Table is Empty',
                'samid' => null,
                'samq' =>  null,
                'quantity' => null,
                'samp' =>  null,
                'same' => null,
                'pname' => null,
                'created_at' => null,
                'actions' => null
            ]];
        }
        $draw = $request->draw ?? 0;
        $array = array();
        $array['aaData'] = $orders;
        $array['sEcho'] = $draw;
        $array['iTotalDisplayRecords'] =  $countIt;
        $array['iTotalRecords'] = $countIt;
        $array['draw'] = $draw;

        return $array;
    }
}
