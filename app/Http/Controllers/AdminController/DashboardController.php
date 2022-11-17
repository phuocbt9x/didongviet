<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\CustomerModel\MemberModel;
use App\Models\OrderModel;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $order = OrderModel::all();
        $turnover = $order->where('status', 3)->sum('total_price');

        $saleThisYear = OrderModel::where('status', 3)
            ->whereYear("created_at",  date("Y"))
            ->selectRaw("DATE_FORMAT(created_at, '%m') as month")
            ->selectRaw("SUM(total_price) as sale")
            ->groupBy("month")
            ->get();

        $saleLastYear = OrderModel::where('status', 3)
            ->whereYear("created_at",  date("Y", strtotime("-1 year")))
            ->selectRaw("DATE_FORMAT(created_at, '%m') as month")
            ->selectRaw("SUM(total_price) as sale")
            ->groupBy("month")
            ->get();

        $lastYear = collect(range(1, 12))->map(
            function ($month) use ($saleLastYear) {
                $match = $saleLastYear->firstWhere('month', $month);
                return $match ? $match->sale : 0;
            }
        );

        $thisYear = collect(range(1, 12))->map(
            function ($month) use ($saleThisYear) {
                $match = $saleThisYear->firstWhere('month', $month);
                return $match ? (int)$match->sale : 0;
            }
        );

        $growth = ((int)$thisYear->get(date("m") - 1) - (int)$thisYear->get(date("m") - 2)) / (int)$thisYear->get(date("m") - 2) * 100;

        $member = MemberModel::where('activated', 1)->count();
        if ($turnover < 1000000) {
            // Anything less than a million
            $format = number_format($turnover);
        } else if ($turnover < 1000000000) {
            // Anything less than a billion
            $format = number_format($turnover / 1000000, 2) . 'M';
        } else {
            // At least a billion
            $format = number_format($turnover / 1000000000, 2) . 'B';
        }

        return view('admin.dashboard', [
            'newOrder' => $order->where('status', 0)->count(),
            'member' => $member,
            'turnover' => $format,
            'lastYear' => $lastYear->implode(','),
            'thisYear' => $thisYear->implode(','),
            'growth' => round($growth, 3)
        ]);
    }
}
