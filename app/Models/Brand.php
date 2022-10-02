<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Brand extends Model
{
    use HasFactory;
    protected $table = 'brand';
    protected $fillable = [
        'id',  'name'
    ];
    public $timestamps = false;

    public function getAllBrand($brand_name)
    {
        $brand_name = DB::table('brand')
                ->select('*')
                ->get();    
    }
}
