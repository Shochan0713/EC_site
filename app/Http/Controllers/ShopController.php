<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Cart;

use App\Http\Controllers\Auth;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Mail; //追記
use App\Mail\Thanks;//追記

class ShopController extends Controller
{
    public function shop() //追加
    {
        $stocks = Stock::Paginate(6); //Eloquantで検索
        return view('shop',compact('stocks')); 
    }

    public function myCart(Cart $cart)
    {
        // $user_id = \Auth::id();
        // $my_carts = Cart::where('user_id',$user_id)->get();
        // return view('mycart',compact('my_carts'));;
        $data = $cart->showCart();
        return view('mycarts',$data);
    }

    public function addMycart(Request $request,Cart $cart)
    {
       $user_id = \Auth::id(); 
       $stock_id=$request->stock_id;

       $cart_add_info=Cart::firstOrCreate(['stock_id' => $stock_id,'user_id' => $user_id]);

       if($cart_add_info->wasRecentlyCreated){
           $message = 'カートに追加しました';
       }
       else{
           $message = 'カートに登録済みです';
       }

       $my_carts = Cart::where('user_id',$user_id)->get();
        //カートに追加の処理
        $stock_id=$request->stock_id;
        $message = $cart->addCart($stock_id);
       
        //追加後の情報を取得
        $data = $cart->showCart();

        return view('mycarts',$data)->with('message',$message); //追記


    }

    public function deleteCart(Request $request,Cart $cart)
    {
 
        //カートから削除の処理
        $stock_id=$request->stock_id;
        $message = $cart->deleteCart($stock_id);
 
        //追加後の情報を取得
        $my_carts = $cart->showCart();
 
        return view('mycarts',$data)->with('message',$message);
 
    }
    public function checkout(Request $request,Cart $cart)
    {
        $checkout_items = $cart->checkoutCart();
        return view('checkout');
 
    }
    
    public function categoryList(Request $request)
    {
        $category = config('category');   
        return view('category')->with('category',$category);
 
    }

}
