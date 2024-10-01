<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Category;
use App\Models\Cart;


class HomeController extends Controller
{
    public function redirect(){

        $usertype=Auth::user()->usertype;

        if($usertype==1)
        {
            return view('admin.home');
        }
        else
        {
            $data = product::where('quantity', '>', 0)->paginate(3);

            $user=auth()->user();

            return view('user.home', compact('data'));
        }
    }


    public function index()
    {
        if(Auth::id())
        {
            return redirect('redirect');
        }
        else
        {
            $data = product::paginate(3);
            return view('user.home', compact('data'));
        }
        
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $user=auth()->user();

        if($search=='')
        {
            $data =product::where('quantity', '>', 0)->paginate(3);
            return view('user.home', compact('data'));

        }

        $data=product::where('title', 'Like', '%'.$search.'%')->where('quantity', '>', 0)->paginate(3);

        return view('user.home', compact('data'));

    }



    public function showcategories(){

        if(Auth::id())
        {
            $user=auth()->user();
            $data = category::paginate(4);
            return view('user.showcategories', compact('data'));
        }

        else
        {   
            $data = category::paginate(4);
            return view('user.showcategories', compact('data'));
        }
       
    }

    public function category($id){

        $name_category = category::where('id', $id)->get();

        if(Auth::id())
        {
            $user=auth()->user();
            $data = product::where('category_id', $id)->where('quantity', '>', 0)->paginate(3);
            return view('user.category', compact('name_category', 'data'));
        }

        else
        {   
            $data = product::where('category_id', $id)->where('quantity', '>', 0)->paginate(3);
            return view('user.category', compact('name_category', 'data'));
        }
       
    }

    public function product($id){

        $name_category = category::where('id', $id)->get();

        if(Auth::id())
        {
            $user=auth()->user();
            $data = product::where('id', $id)->get();
            return view('user.product', compact('name_category','data'));
        }

        else
        {   
             $data = product::where('id', $id)->get();
            return view('user.product', compact('name_category', 'data'));
        }
       
    }
    
}
