<?php


namespace App\Helpers\Tables;

use Illuminate\Support\Facades\DB;

class InitDataTable
{
    // Like query on join tables
    public static function refactorRelationshipsForDataTable($tableName, $searchKeyword, $joins = [])
    {
        if (count($joins) > 0) {
            foreach ($joins as $key => $join) {
                $tableName = $tableName->with($key)->whereHas($key, function ($q) use ($searchKeyword, $join) {
                    foreach ($join as $joinColumn) {
                        $q->where($joinColumn, 'like', '%' . $searchKeyword . '%');
                    }
                });
            }
        }
        return $tableName;
    }

    // Like query on join tables with where specific ID
    public static function refactorAndWhereRelationshipsForDataTable($tableName, $searchKeyword, $joins = [], $whereId)
    {
        if (count($joins) > 0) {
            foreach ($joins as $key => $join) {
                $tableName = $tableName->with($key)->whereHas($key, function ($q) use ($searchKeyword, $join, $whereId) {
                    foreach ($join as $joinColumn) {
                        $q->where($joinColumn, 'like', '%' . $searchKeyword . '%')->whereRaw($whereId);
                    }
                });
            }
        }
        return $tableName;
    }

    // Or Where when there is only like query
    public static function refactorWhereClauseForDataTable($tableName, $columns, $searchKeyword)
    {
        foreach ($columns as $column) {
            $tableName = $tableName->orWhere($column, 'like', '%' . $searchKeyword . '%');
        }
        return $tableName;
    }

    // And Where when we have to do like query on specific ID
    public static function refactorAndWhereClauseForDataTable($tableName, $columns, $searchKeyword, $whereId)
    {

        foreach ($columns as $column) {
            $tableName = $tableName->orWhere($column, 'like', '%' . $searchKeyword . '%')->whereRaw($whereId);
        }
        return $tableName;
    }

    //Query for Filters
    public static function refactorFilterForDataTable($tableName, $where)
    {

        foreach ($where as $strwhere) {

            $tableName = $tableName->whereRaw($strwhere);
        }


        return $tableName;
    }


    //Query Where in for relationships
    public static function refactorWhereInFilterForDataTable($tableName, $allTableElements, $getColumn, $whereIn)
    {

        $allelementsIds = array();

        foreach ($allTableElements as $allTableElement) {

            array_push($allelementsIds,  $allTableElement->$getColumn);
        }

        $tableName = $tableName->whereIn($whereIn, $allelementsIds);

        return $tableName;
    }
}
