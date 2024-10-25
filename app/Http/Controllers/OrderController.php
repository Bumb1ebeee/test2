<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::whereNot('status', 'completed')->orderBy('table', 'asc')->get();
        $dishes = Dish::all();

        return view('order', compact('orders', 'dishes'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'dish' => 'required',
            'table' => 'required|min:1',
        ]);

        $order = new Order();
        $order->dish_id = $request->input('dish');
        $order->table = $request->input('table');
        $order->save();

        return redirect('/order');
    }

    public function dish(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $dish = new Dish();
        $dish->name = $request->input('name');
        $dish->save();

        return redirect('/order');
    }

    public function archive()
    {
        $orders = Order::where('status', 'completed')->orderBy('created_at', 'desc')->get();

        return view('archive', compact('orders'));
    }

    public function update(Request $request) {
        $order = Order::findOrFail($request->input('id'));

        if ($order->status == 'accepted') {
            $order->status = 'cooked';
        }
        else if ($order->status == 'cooked') {
            $order->status = 'completed';
        }
        $order->save();
        return redirect('/order');
    }
}
