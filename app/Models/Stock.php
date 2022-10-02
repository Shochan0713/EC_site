<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Stock extends Model
{
    protected $guarded = [
        'id'
      ];

    protected $fillable = [
        'name', 'detail', 'fee','imgpath','store_no','category'
    ];
    public function getAllStock($mystore_id)
    {
        $stocks = DB::table('stocks')
            ->select('*')
            ->leftjoin('admins','store_no','=','admins.id')
            ->where('store_no','=',$mystore_id)
            ->orderByDesc('stocks.created_at')
            ->paginate(6);
            return $this->hasMany('App\Models\Stock');       
    }
    public function createStock($inputs,$mystore_id)
    {
        return DB::table('stocks')
                    ->insert([
                        'name'=>$inputs['name'],
                        'detail'=>$inputs['detail'],
                        'fee'=>$inputs['fee'],
                        'imgpath'=>$inputs['imgpath'],
                        'category'=>$inputs['category'],
                        'store_no'=>$mystore_id,
                    ]);        
    }
}
