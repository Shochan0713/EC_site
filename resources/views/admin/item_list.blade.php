@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
           <div class="">
                <form action="{{route('storeRegistration')}}" method="get">
                    @csrf
                    <input type="submit" value="商品登録">
                </form>
               <div class="d-flex flex-row flex-wrap">
                
                 @foreach($stocks as $stock)
    
                        <div class="col-xs-6 col-sm-4 col-md-4 ">
                            <div class="mycart_box">
                                {{$stock->name}} <br>
                                {{$stock->fee}}円<br>
                                <img src="/image/{{$stock->imgpath}}" alt="" class="incart" >
                                <br>
                                {{$stock->detail}} <br>

                            </div>

                        </div>
                        @endforeach                    
                        </div>
                        <div class="text-center" style="width: 200px;margin: 20px auto;">
                        {{  $stocks->links()}} 
               </div>
           </div>
       </div>
   </div>
</div>
@endsection