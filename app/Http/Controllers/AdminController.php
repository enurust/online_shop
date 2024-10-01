<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function product()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype==1)
            {
                return view('admin.product');
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return view('auth.login');
        }

        

    }

    public function uploadproduct(Request $request)
    {   

        if(Auth::user()->usertype==1)
        {
            $data=new product;

            if($request->file)
            {

            $image=$request->file;

            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->file->move('productimage', $imagename);

            $data->image=$imagename;

            }


            $data->title=$request->title;

            $data->price=$request->price;

            $data->category_id=$request->category;

            $data->description=$request->description;

            $data->quantity=$request->quantity;

            $data->save();

            return redirect()->back()->with('message', 'Товар добавлен');
        }
        else
        {
            return redirect()->back();
        }
        
    }

    public function showproduct()
    {   
        if(Auth::user()->usertype==1)
        {
            $data=product::all();
            return view('admin.showproduct', compact('data'));
        }
        else
        {
            return redirect()->back();
        }
        

    }

    public function deleteproduct($id)
    {
        $data=product::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Товар удален');
    }


    public function updateview($id)
    {

        $data=product::find($id);


        return view('admin.updateview', compact('data'));

    }

    public function updateproduct(Request $request, $id)
    {
        if(Auth::user()->usertype==1)
        {
            $data=product::find($id);

            $image=$request->file;

            if($image)
            {

                $imagename=time().'.'.$image->getClientOriginalExtension();

                $request->file->move('productimage', $imagename);

                $data->image=$imagename;

             }

                $data->title=$request->title;

                $data->price=$request->price;

                $data->category_id=$request->category;

                $data->description=$request->description;

                $data->quantity=$request->quantity;

                $data->save();

            return redirect()->back()->with('message', 'Товар обновлен');
        }
        else
        {
            return redirect()->back();
        }
        
    }

    public function showorder()
    {
        if(Auth::user()->usertype==1)
        {
            $order=order::all();

            return view('admin.showorder', compact('order'));
        }
        else
        {
            return redirect()->back();
        }
        
    }

    public function confirmStatus($id)
    {
        $order = Order::findOrFail($id);

        
        $order->status = 'confirmed';
        $order->save();

        return redirect()->back()->with('message', 'Заказ подтвержден');
    }

    
    public function cancelStatus($id)
    {
        $order = Order::findOrFail($id);
        
        
        $user = $order->user;
        $user->balance += $order->total; 
        $user->save();

        
        foreach ($order->cart_items as $item) {
            $product = Product::find($item['id']);
            if ($product) {
                $product->quantity += $item['quantity'];
                $product->save();
            }
        }

        
        $order->status = 'canceled';
        $order->save();

        return redirect()->back()->with('message', 'Заказ отменен и баланс восстановлен');
    }

    public function allorders()
    {
        if(Auth::user()->usertype==1)
        {
            $orders = Order::with('user')->get();

            return view('admin.showorder', compact('orders')); 
        }
        else
        {
            return redirect()->back();
        }
        
    }

    public function detail($id)
    {   
        if(Auth::user()->usertype==1)
        {
            $order = Order::findOrFail($id);

            return view('admin.detail', compact('order'));
        }
        else
        {
            return redirect()->back();
        }
        
    }
}
