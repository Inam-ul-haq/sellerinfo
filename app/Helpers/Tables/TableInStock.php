<?php


namespace App\Helpers\Tables;

use App\Helpers\Tables\InitDataTable;
use App\Models\Instock;
use Illuminate\Support\Facades\Auth;

class TableInStock
{

    public static function initinstockDataTable($request, $limit, $skip)
    {

        if ($request->has('length')) {
            $limit = (int) $request->length;
        }
        if ($request->has('start')) {
            $skip = (int) $request->start;
        }
        $search = $request->search['value'] ?? '';
        $instocks = Instock::query();
        // $instocks->where('user_id',Auth::user()->id);
        $instocks = $instocks->orderBy('id', 'DESC');


        if (!empty($request->search['value'])) {

            $columns = ['url', 'product'];
            $instocks = InitDataTable::refactorWhereClauseForDataTable($instocks, $columns, $search);
        }
        // Table Sorting

        if (!empty($request->order[0]['dir'])) {

            $colname = $request->columns[$request->order[0]['column']]['data'];

            $instocks = $instocks->orderBy($colname, $request->order[0]['dir']);
        }
        $instocks->where('user_id',Auth::user()->id);
        $countIt = $instocks->count();

        $instocks = $instocks->skip($skip)
            ->take($limit)
            ->get()
            ->map(function ($instock) {
                $editbutton = '';
                $editbutton = '<a data-toggle="kt-tooltip" data-placement="left" title="View" class="btn btn-sm btn-clean btn-icon btn-icon-md" href="' . route('instock.edit', $instock->id) . '"><i class="fa fa-pen" aria-hidden="true"></i></a>';
                
                $delbutton = '';
                $delbutton = '<a href="'.route('instock.destroy',$instock->id).'" data-placement="left" title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md"  ><i class="la la-trash"></i></button>';
                
                // $activebutton = '';
                // $activebutton = '<a href="'.route('instock.update',$instock->id).'" data-placement="left" title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md"  ><i class="la la-trash"></i></button>';
                
                $stractions = $editbutton.$delbutton;

                $instock->status == 1 ? $status = 'Yes' : $status= 'No';
                $instock->active == 1 ? $active = 'Yes' : $active= 'No';

                return [


                    'url' => $instock->url,
                    'product' =>  $instock->product,
                    'store' =>  $instock->store,
                    'status' => $status,
                    'active' =>  $active,
                    'actions' => $stractions
                ];
            });
        if (count($instocks) == 0) {

            $instocks = [[

                    'url' => 'Table is Empty',
                    'product' =>  null,
                    'store' =>  null,
                    'active' =>  null,
                    'status' => null,
                    'actions' => null
            ]];
        }
        $draw = $request->draw ?? 0;
        $array = array();
        $array['aaData'] = $instocks;
        $array['sEcho'] = $draw;
        $array['iTotalDisplayRecords'] =  $countIt;
        $array['iTotalRecords'] = $countIt;
        $array['draw'] = $draw;

        return $array;
    }
}
