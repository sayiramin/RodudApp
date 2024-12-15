<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();
        $completedOrders = Order::where('status', 'completed')->count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $inProgressOrders = Order::where('status', 'in_progress')->count();
        $totalUsers = User::count();
        $queryOrder = Order::with('user');
        $orders = $queryOrder->orderBy('created_at', 'desc')->take(5)->get();
        $queryUser = User::query();
        $users = $queryUser->orderBy('created_at', 'desc')->take(5)->get();


        return view('dashboard', compact('totalOrders', 'completedOrders', 'pendingOrders', 'inProgressOrders','totalUsers','orders','users'));
    }
}
