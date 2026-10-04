<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\View\View;

class IndexOrdersController extends Controller
{
    public function __invoke(): View
    {
        $orders = Order::with(['user', 'items.book'])
            ->latest()
            ->paginate(15);

        return view('admin.orders.index', compact('orders'));
    }
}
