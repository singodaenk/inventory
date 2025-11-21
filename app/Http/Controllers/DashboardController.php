<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\StockIn;
use App\Models\StockOut;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $lowStockProducts = Product::where('stock', '<=', \DB::raw('min_stock'))->count();
        
        $recentStockIns = StockIn::with('product')->latest()->take(5)->get();
        $recentStockOuts = StockOut::with('product')->latest()->take(5)->get();

        return view('dashboard', compact(
            'totalProducts', 
            'lowStockProducts',
            'recentStockIns',
            'recentStockOuts'
        ));
    }
}