<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Product; 
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function orders()
    {
        $user = auth()->user();

        $balance = $user->balance;
        $orders = $user->orders()->get();


        return view('user.orders', compact('orders', 'balance'));
    }

    public function detailorders($id)
    {   
        
        $order = Order::findOrFail($id);
        

        return view('user.detailorders', compact('order'));
    }
}
