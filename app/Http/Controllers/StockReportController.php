<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;

class StockReportController extends Controller
{
    public function index()
    {
        // Calculate total stock
        $totalStock = Product::sum('stock_quantity');

        // Calculate total sales (assuming 'sell' type represents sales)
        $totalSales = Transaction::where('type', 'sell')->sum('amount');

        // Calculate total purchases (assuming 'purchase' type represents purchases)
        $totalPurchases = Transaction::where('type', 'purchase')->sum('amount');

        // Get stock trends (e.g., by month)
        $salesTrend = Transaction::selectRaw('MONTH(transaction_date) as month, SUM(amount) as total')
            ->where('type', 'sell')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Get purchases trend (e.g., by month)
        $purchasesTrend = Transaction::selectRaw('MONTH(transaction_date) as month, SUM(amount) as total')
            ->where('type', 'purchase')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Pass data to the view
        return view('dashboard', compact('totalStock', 'totalSales', 'totalPurchases', 'salesTrend', 'purchasesTrend'));
    }
}
