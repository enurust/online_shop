<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Product; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    
    public function addToCart(Request $request, Product $product)
    {
        
        if(Auth::id())
        {
            $cart = session()->get('cart', []);

            if (isset($cart[$product->id])) {
                $cart[$product->id]['quantity']+= $request->input('quantity', 1);
            } else {
                
                $cart[$product->id] = [
                    'id' => $product->id,   
                    'name' => $product->title,
                    'price' => $product->price,
                    'quantity' => $request->quantity,
                ];
            }

           
            session()->put('cart', $cart);

            return redirect()->back()->with('message', 'Товар добавлен в корзину!');

        }

        else
        {
            return redirect('login');
        }
        
    }

   
    public function showcart()
    {
        if(auth()->user()->usertype != 1)
        {
            $cart = session()->get('cart', []);

            $balance = auth()->user()->balance;
            
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }
            return view('user.showcart', compact('cart', 'total', 'balance'));
        }
        else
        {
            return view('product');
        }
        
    }

   
    public function removeFromCart($id)
    {
        
        $cart = session()->get('cart', []);

        
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('message', 'Товар удален из корзины!');
    }

    public function checkout()
    {
        
       // if (!auth()->check()) {
       //     return redirect()->route('login')->with('error', 'Вы должны войти в систему для оформления заказа.');
       // }

        $cart = session()->get('cart', []);

        //if (empty($cart)) {
        //    return redirect()-back()->with('error', 'Ваша корзина пуста!');
      // }

        $total = 0;
        foreach ($cart as $item) 
        {
            $product = Product::find($item['id']);

            if ($product->quantity < $item['quantity']) 
            {
                return redirect()->back()->with('message', 'Недостаточно товара');
            }
        }

            $total += $item['price'] * $item['quantity'];

        $user = auth()->user();

        if ($user->balance < $total) 
        {
            return redirect()->back()->with('message', 'Недостаточно средств на балансе для оформления заказа.');
        }

        $user->deductBalance($total);

        $order = Order::create([
            'id_customer' => $user->id,
            'cart_items' => json_encode($cart), 
            'total' => $total,
        ]);

        foreach ($cart as $item) 
        {
            $product = Product::find($item['id']);
            $product->decrement('quantity', $item['quantity']); 
        }

        session()->forget('cart');

        return redirect()->back()->with('message', 'Ваш заказ оформлен успешно!');
    }

    public function increaseQuantity($id)
    {
       
        $cart = session()->get('cart', []);

        
        if(isset($cart[$id])) 
        {
            $product = Product::find($id); 

                
            if ($cart[$id]['quantity'] < $product->quantity) 
            {
                $cart[$id]['quantity']++; 
            }
            else
            {

                return redirect()->back()->with('message', 'Недостаточно товара на складе для увеличения количества.');
            }

            session()->put('cart', $cart);
        }

        return redirect()->back()->with('message', 'Количество товара увеличено.');

    }

    public function decreaseQuantity($id)
    {
        
        $cart = session()->get('cart', []);

        
        if(isset($cart[$id])) 
        {
            if ($cart[$id]['quantity'] > 1) 
            {
                $cart[$id]['quantity']--; 
            } 
            else 
            {
                return redirect()->back()->with('message', 'Нельзя уменьшить количество товара меньше 1.');
            }

        
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('message', 'Количество товара уменьшено.');
    }

}


