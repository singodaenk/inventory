<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockIn;
use App\Models\Product;

class StockInController extends Controller
{
    public function index()
    {
        $stockIns = StockIn::with(['product', 'user'])->latest()->get();
        return view('stock-ins.index', compact('stockIns'));
    }

    public function create()
    {
        $products = Product::all();
        return view('stock-ins.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'date' => 'required|date',
            'note' => 'nullable|string'
        ]);

        $stockIn = StockIn::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'date' => $request->date,
            'note' => $request->note,
            'user_id' => auth()->id()
        ]);

        // Update product stock
        $product = Product::find($request->product_id);
        $product->stock += $request->quantity;
        $product->save();

        return redirect()->route('stock-ins.index')->with('success', 'Stok masuk berhasil dicatat.');
    }
}