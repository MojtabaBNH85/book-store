<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Order;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'booksCount' => Book::count(),
            'usersCount' => User::count(),
            'ordersCount' => Order::count(),
            'revenue' => Order::sum('total'),
            'latestOrders' => Order::with('user')->latest()->take(5)->get(),
            'lowStock' => Book::where('stock', '<', 10)->take(5)->get(),
        ]);
    }
}
