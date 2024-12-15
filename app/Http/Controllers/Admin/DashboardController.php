<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistics
        $totalOrders = Order::count();
        $totalUsers = User::where('is_admin', false)->count();

        // Example stats
        $pendingOrders = Order::where('status', 'pending')->count();
        $deliveredOrders = Order::where('status', 'delivered')->count();

        return view('admin.dashboard', compact('totalOrders', 'totalUsers', 'pendingOrders', 'deliveredOrders'));
    }
}
