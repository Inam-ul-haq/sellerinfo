<?php

namespace App\Http\Controllers;

use App\Helpers\Tables\MonthlyTableDashboard;
use App\Helpers\Tables\YearlyTableDashboard;
use Illuminate\Http\Request;
use App\Models\Order;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('dashboard.dashboard');
    }
    public function MonthlyTableDashboard(Request $request)
    {

        $tableOrder = MonthlyTableDashboard::initMonthlyDashboardDataTable($request, $this->limit, $this->skip);
        return $tableOrder;
    }
    public function YearlyTableDashboard(Request $request)
    {

        $tableOrder = YearlyTableDashboard::initYearlyDashboardDataTable($request, $this->limit, $this->skip);
        return $tableOrder;
    }


    // public function MonthlyDashboardQuantity()
    // {
    //     Order::whereDate('created_at', '>', now()->subMonth())->get()
    //         ->groupBy('pname')
    //         ->mapWithKeys(function ($item, $pname) {
    //             return [$pname => $item->sum('quantity')];
    //         });
    // }
    // public function MonthlyDashboardPrice()
    // {
    //     Order::whereDate('created_at', '>', now()->subMonth())->get()
    //         ->groupBy('pname')
    //         ->mapWithKeys(function ($item, $pname) {
    //             return [$pname => $item->sum('samp')];
    //         });
    // }
    // public function YearlyDashboardQuantity()
    // {
    //     $lastOneYear = Order::whereDate('created_at', '>', now()->subYear())->get()
    //         ->groupBy('pname')
    //         ->mapWithKeys(function ($item, $pname) {
    //             return [$pname => $item->sum('quantity')];
    //         });
    // }
    // public function YearlyDashboardPrice()
    // {
    //     Order::where('pname', 'Apple')->whereDate('created_at', '>', now()->subYear())->get()
    //         ->groupBy('pname')
    //         ->mapWithKeys(function ($item, $pname) {
    //             return ['pname' => $item->sum('samp')];
    //         });
    // }


}
