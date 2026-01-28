<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\Order;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index()
    {
        $totalEvents = Event::count();
        $totalCategories = Kategori::count();
        $totalOrders = Order::count();
        return view('admin.dashboard', compact('totalEvents', 'totalCategories', 'totalOrders'));
    }
}
