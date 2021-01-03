<?php


namespace App\Helpers\Tables;

use App\Helpers\Tables\InitDataTable;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TableAdmin
{

    public static function initAdminDataTable($request, $limit, $skip)
    {

        if ($request->has('length')) {
            $limit = (int) $request->length;
        }
        if ($request->has('start')) {
            $skip = (int) $request->start;
        }
        $search = $request->search['value'] ?? '';
        $users = User::query();
        $users = $users->orderBy('id', 'DESC');


        if (!empty($request->search['value'])) {

            $columns = ['email', 'username'];
            $users = InitDataTable::refactorWhereClauseForDataTable($users, $columns, $search);
        }
        // Table Sorting

        if (!empty($request->order[0]['dir'])) {

            $colname = $request->columns[$request->order[0]['column']]['data'];

            $users = $users->orderBy($colname, $request->order[0]['dir']);
        }

        $countIt = $users->count();

        $users = $users->skip($skip)
            ->take($limit)
            ->get()
            ->map(function ($user) {
                $editbutton = '';
                $editbutton = '<a data-toggle="kt-tooltip" data-placement="left" title="View" class="btn btn-sm btn-clean btn-icon btn-icon-md" href="' . route('admin.edit', $user->id) . '"><i class="fa fa-pen" aria-hidden="true"></i></a>';
                $delbutton = '';

                $delbutton = '<a href="' . route('admin.destroy', $user->id) . '" data-placement="left" title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md"  ><i class="la la-trash"></i></button>';
           
                if (Auth::user()->is_admin == 1 && Auth::user()->id == $user->id) {
                    $stractions =$editbutton;
                }
                else{
                    $stractions = $editbutton . $delbutton;
                }
                
                return [


                    'username' => $user->name,
                    'email' =>  $user->email,
                    'joindate' => setDateTimeFormat($user->created_at),
                    'actions' => $stractions
                ];
            });
        if (count($users) == 0) {

            $users = [[

                'username' => 'Table is Empty',
                'email' =>  null,
                'joindate' =>  null,
                'actions' => null
            ]];
        }
        $draw = $request->draw ?? 0;
        $array = array();
        $array['aaData'] = $users;
        $array['sEcho'] = $draw;
        $array['iTotalDisplayRecords'] =  $countIt;
        $array['iTotalRecords'] = $countIt;
        $array['draw'] = $draw;

        return $array;
    }
}
