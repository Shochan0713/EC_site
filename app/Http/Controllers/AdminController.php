<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Cart;
use App\Models\Brand;
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
        $request->getSession()->put('category',$request->category);
        $request->getSession()->put('brand',$request->brand);

        $category = config('category');
        $brand_name = DB::table('brand')
                ->select('*')
                ->get();
        return view('stock_registration',compact('category','brand_name'));
    }
    public function storeCofirm(Request $request){
        //session格納
        $inputs = $request->all();
        //インスタンス化
        $stock =  new Stock();
        //画像の保存
        $dir = 'image';
        //画像を登録できない
        $file_name = $request->file('imgpath')->getClientOriginalName();
        $request->file('imgpath')->storeAs('public/'.$dir, $file_name);   

        //ID取得
        $mystore_id  = Auth::guard('admin')->id(); 
        //DB登録
        $stock -> create([
            'name'=>$inputs['name'],
            'detail'=>$inputs['detail'],
            'fee'=>$inputs['fee'],
            'imgpath'=>$inputs['imgpath'],
            'category'=>$inputs['category'],
            'store_no'=>$mystore_id,
        ]);

        //ブランドのデータ照合
        $brand_id = DB::table('brand')
            ->select('id')
            ->get();
        
        $session_brand_id = $inputs['brand'];
        $brand =  new Brand();
        if($session_brand_id  != $brand_id){
            $brand -> create([
                'name'=>$inputs['brand'],
            ]);

        };
        // カテゴリー一覧
        $category = config('category');
        $category_name = $category[$inputs['category']];

        return view('stock_confirm',compact('inputs','category_name'));
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
            ->select('stocks.*')
            ->leftjoin('admins','store_no','=','admins.id')
            ->where('store_no','=',$mystore_id)
            ->orderByDesc('stocks.created_at')
            ->paginate(6);
        return view('/admin/item_list',compact('stocks')); 
    }
}
