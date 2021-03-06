<?php


namespace App\Helpers\Tables;

use App\Helpers\Tables\InitDataTable;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class YearlyTableDashboard
{

    public static function initYearlyDashboardDataTable($request, $limit, $skip)
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

        $orders->distinct('pname');
        $orders->groupBy('pname');
        $orders->orderBy('id', 'DESC');


        if (!empty($request->search['value'])) {

            $columns = ['samq', 'quantity', 'samid', 'pname'];
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

                $price = Order::where('pname', $order->pname)->whereDate('created_at', '>', now()->subYear())->get()
                    ->groupBy('pname')
                    ->mapWithKeys(function ($item, $pname) {
                        return ['price' => $item->sum('samp')];
                    })['price'];

                $quantity = Order::where('pname', $order->pname)->whereDate('created_at', '>', now()->subYear())->get()
                    ->groupBy('pname')
                    ->mapWithKeys(function ($item, $pname) {
                        return ['quantity' => $item->sum('quantity')];
                    })['quantity'];

                $samq = Order::where('pname', $order->pname)->whereDate('created_at', '>', now()->subYear())->get()
                    ->groupBy('pname')
                    ->mapWithKeys(function ($item, $pname) {
                        return ['samq' => $item->sum('samq')];
                    })['samq'];

                return [

                    'pname' =>  $order->pname,
                    'quantity' => $quantity,
                    'samq' =>  $samq,
                    'samp' =>  $price,
                ];
            });
        if (count($orders) == 0) {

            $orders = [[

                'pname' => 'Table is empty',
                'samq' =>  null,
                'quantity' => null,
                'samp' =>  null,
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
