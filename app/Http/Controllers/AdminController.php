<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Cart;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Mail;
use App\Mail\Thanks;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function adminStore(){
        //ユーザーのIDを取得
        $mystore_id  = Auth::guard('admin')->id(); 
        $stocks = DB::table('stocks')
            ->select('stocks.*')
            ->leftjoin('admins','store_no','=','admins.id')
            ->where('store_no','=',$mystore_id)
            ->orderByDesc('stocks.created_at')
            ->paginate(6);
        // dd($stocks);
        return view('/admin/item_list',compact('stocks'));
    }


    public function storeRegistration(Request $request){
        //session格納
        $request->getSession()->put('name',$request->name);
        $request->getSession()->put('detail',$request->detail);
        $request->getSession()->put('fee',$request->fee);
        $request->getSession()->put('imgpath',$request->imgpath);
        $request->getSession()->put('category',$request->category);
        $request->getSession()->put('brand',$request->brand);
        //カテゴリー一覧表示
        $category = config('category');
        //ブランドの名前取得
        $brand_name = DB::table('brand')
                ->select('*')
                ->get();
        return view('admin/stock_registration',compact('category','brand_name'));
    }

    public function storeCofirm(Request $request){
        //session格納
        $inputs = $request->all();
        //インスタンス化
        $stock_model =  new Stock();
        //画像の保存
        $dir = 'image';
        //画像登録
        $file_name = $request->file('imgpath')->getClientOriginalName();
        $request->file('imgpath')->storeAs('public/'.$dir, $file_name);   

        //ID取得
        $mystore_id  = Auth::guard('admin')->id(); 

        //DB登録
        $stock_model->createStock($inputs,$mystore_id);

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

        return view('admin/stock_confirm',compact('inputs','category_name'));
    }


    public function storeCompleate(){
        return view('admin/stock_compleate');
    }

    public function myStore(){
        $mystore  = Auth::guard('admin')->user();   
           
        return view('admin/mystore',compact('mystore'));
    }

    public function itemList(){
    
        $mystore_id  = Auth::guard('admin')->id(); 
        $stocks = DB::table('stocks')
            ->select('stocks.*')
            ->leftjoin('admins','store_no','=','admins.id')
            ->where('store_no','=',$mystore_id)
            ->orderByDesc('stocks.created_at')
            ->paginate(6);

        //ユーザーのIDを取得
        $mystore_id  = Auth::guard('admin')->id();
        //モデルを呼び出す
        $stock_model = new Stock;
        //全ての商品
        $stocks = $stock_model->getAllStock($mystore_id);
        dd($stocks);
        return view('/admin/item_list',compact('stocks')); 
    }
}
