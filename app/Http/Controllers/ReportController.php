<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\StockIn;
use App\Models\StockOut;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function stockReport()
    {
        $products = Product::with('category')->get();
        return view('reports.stock', compact('products'));
    }

    public function movementReport(Request $request)
    {
        $startDate = $request->get('start_date', Carbon::now()->subMonth()->format('Y-m-d'));
        $endDate = $request->get('end_date', Carbon::now()->format('Y-m-d'));

        $stockIns = StockIn::with('product')
            ->whereBetween('date', [$startDate, $endDate])
            ->get();

        $stockOuts = StockOut::with('product')
            ->whereBetween('date', [$startDate, $endDate])
            ->get();

        return view('reports.movement', compact('stockIns', 'stockOuts', 'startDate', 'endDate'));
    }

    public function lowStockReport()
    {
        $products = Product::where('stock', '<=', \DB::raw('min_stock'))->get();
        return view('reports.low-stock', compact('products'));
    }
}