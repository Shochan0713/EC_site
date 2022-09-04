<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
//use App\Http\Controllers\Auth;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Mail;
use App\Mail\Thanks;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function adminStore(){

        // $stocks = Stock::Paginate(6); //Eloquantで検索
        $mystore_id  = Auth::guard('admin')->id(); 
        $stocks = DB::table('stocks')
            ->select('*')
            ->leftjoin('admins','store_no','=','admins.id')
            ->where('store_no','=',$mystore_id)
            ->orderByDesc('stocks.created_at')
            ->paginate(6);
        return view('itemList',compact('stocks'));
    }


    public function storeRegistration(Request $request){

        $request->getSession()->put('name',$request->name);
        $request->getSession()->put('detail',$request->detail);
        $request->getSession()->put('fee',$request->fee);
        $request->getSession()->put('imgpath',$request->imgpath);
        return view('stock_registration');
    }
    public function storeCofirm(Request $request){

        $inputs = $request->all();
        $stock =  new Stock();
        $mystore_id  = Auth::guard('admin')->id(); 
        $stock -> create([
            'name'=>$inputs['name'],
            'detail'=>$inputs['detail'],
            'fee'=>$inputs['fee'],
            'imgpath'=>$inputs['imgpath'],
            'store_no'=>$mystore_id,

        ]);

        return view('stock_confirm',compact('inputs'));
    }
    public function storeCompleate(){
        
        
        
        return view('stock_compleate');
    }
    public function myStore(){
        $mystore  = Auth::guard('admin')->user();   
           
        return view('admin/mystore',compact('mystore'));
    }

    public function itemList(){
    
        // $stocks = Stock::Paginate(6); //Eloquantで検索
        $mystore_id  = Auth::guard('admin')->id(); 
        $stocks = DB::table('stocks')
            ->select('*')
            ->leftjoin('admins','store_no','=','admins.id')
            ->where('store_no','=',$mystore_id)
            ->orderByDesc('stocks.created_at')
            ->paginate(6);
        return view('/admin/item_list',compact('stocks')); 
    }
}
