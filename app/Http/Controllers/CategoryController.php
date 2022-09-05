<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function deleteCart(Request $request,Cart $cart)
    {
 
        //カートから削除の処理
        $stock_id=$request->stock_id;
        $message = $cart->deleteCart($stock_id);
 
        //追加後の情報を取得
        $my_carts = $cart->showCart();
 
        return view('mycarts',$data)->with('message',$message);
 
    }
}
