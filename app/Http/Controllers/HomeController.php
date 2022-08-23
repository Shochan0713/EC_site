<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Cart;

use App\Http\Controllers\Auth;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Mail; //追記
use App\Mail\Thanks;//追記

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function myPageShow(){
        return view('mypage');
    }

    public function adminPageShow(){
        return view('adminpage');
    }
    public function adminStore(){
        return view('admin.admin_store');
    }
}
