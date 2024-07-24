<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Show the order form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $menus = Menu::all();
        return view('order', compact('menus'));
    }

    /**
     * Store a newly created order in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'quantities' => 'required|array',
            'quantities.*' => 'integer|min:0',  // Pastikan bahwa setiap kuantitas adalah integer dan minimal 0
        ]);
    
        foreach ($request->quantities as $menu_id => $quantity) {
            if ($quantity > 0) {  // Hanya simpan jika kuantitas lebih dari 0
                Order::create([
                    'user_id' => Auth::id(),
                    'menu_id' => $menu_id,
                    'quantity' => $quantity,
                ]);
            }
        }
    
        return redirect()->route('order')->with('success', 'Order placed successfully!');
    }
    
    /**
     * Show all orders to admin.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil hanya pesanan dengan status 'pending'
        $orders = Order::with('user', 'menu')->where('status', 'pending')->get();
        return view('admin.orders.index', compact('orders'));
    }
    
    public function approvedOrders()
{
    $orders = Order::with('user', 'menu')->where('status', 'approved')->get();
    return view('admin.orders.approved', compact('orders'));
}


    /**
     * Update the status of an order.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $order = Order::findOrFail($id);
        $order->update([
            'status' => $request->input('status'),
        ]);

        return redirect()->route('admin.orders.index')->with('success', 'Order status updated!');
    }
}
