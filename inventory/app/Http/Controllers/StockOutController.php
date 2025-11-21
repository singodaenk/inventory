<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockOut;
use App\Models\Product;

class StockOutController extends Controller
{
    public function index()
    {
        $stockOuts = StockOut::with(['product', 'user'])->latest()->get();
        return view('stock-outs.index', compact('stockOuts'));
    }

    public function create()
    {
        $products = Product::all();
        return view('stock-outs.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'date' => 'required|date',
            'note' => 'nullable|string'
        ]);

        $product = Product::find($request->product_id);

        // Check if stock is sufficient
        if ($product->stock < $request->quantity) {
            return back()->withErrors(['quantity' => 'Stok tidak mencukupi. Stok tersedia: ' . $product->stock]);
        }

        $stockOut = StockOut::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'date' => $request->date,
            'note' => $request->note,
            'user_id' => auth()->id()
        ]);

        // Update product stock
        $product->stock -= $request->quantity;
        $product->save();

        return redirect()->route('stock-outs.index')->with('success', 'Stok keluar berhasil dicatat.');
    }
}