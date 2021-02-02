<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        //show all products
        $products = Product::all();
        return view('product',compact('products'));
    }

    public function detail($id)
    {
        // get One product detail
       $product = Product::findOrFail($id);
       return view('product_details',compact('product'));
    }


    public function search(Request $request)
    {
        // search input return data from $_get['query']
        $data = Product::where('name','LIKE','%'.$request->input('query').'%')->get();
        return view('search',compact('data'));
    }

    public function addToCart(Request $request){
        //check if user loged will add 
        if($request->session()->has('user'))
        {
            //add item info inside cart table
            $cart = new Cart;
            $cart->user_id = auth()->user()->id;
            $cart->product_id = $request->product_id;
            $cart->save();
            return redirect('/products');
        }else{
            return redirect('/login');
        }
    }

    static function cartItem (){
        //get Count of item in DB
        $user_id = auth()->user()->id;
        return Cart::where('user_id',$user_id)->count();
    }


    /// Relation Query 
    public function cartlist()
    {
        //show all items for user
        $user_id = auth()->user()->id;
        $products = DB::table('carts')->join('products','carts.product_id','=','products.id')
                                      ->where('carts.user_id',$user_id)
                                      ->select('products.*','carts.id as cart_id')->get();

        return view('cartlist',compact('products'));
    }
    
    public function removeItem($id)
    {
        // remove item
         Cart::findOrFail($id)->delete();
         return back();

    }

    public function orderNow()
    {
        // calc the items price
        $user_id = auth()->user()->id;
        $total = DB::table('carts')->join('products','carts.product_id','=','products.id')
                                      ->where('carts.user_id',$user_id)
                                      ->select('products.*','carts.id as cart_id')->sum('products.price');
        $ship_price = 35 ;
        return view('order_now',compact('total','ship_price'));

    }
    public function orderPlace(Request $request)
    {
        // save order in order table and delete from Cart table
        $user_id = auth()->user()->id;
        $allCart = Cart::where('user_id',$user_id)->get();//get user items
        $i=1;
        foreach($allCart as $cart)
        {
            
            $order = new Order ;
            $order->product_id         = $cart['product_id'];
            $order->user_id            = $cart['user_id'];
            $order->address            = $request->address ;
            $order->payment_method     = $request->payment_method;
            $order->status             = 'pending';
            $order->payment_status     = 'pending';
            //save
            $order->save();
            Cart::where('user_id',$user_id)->delete(); //remove item from the Cart()
        }
        return back();
    }

    // show my orders
    public function myOrders()
    {
        $user_id = auth()->user()->id;
        $orders = DB::table('orders')->join('products','orders.product_id','=','products.id')
                                      ->where('orders.user_id',$user_id) ->get();

                                     
        
        return view('myorders',compact('orders'));
    }







}


