@extends('layouts.app')

@section('content')
        <h3>プロフィール</h3>
        
        
            <div style="margin-top: 30px;">
        
                <table class="table table-striped">
                    <form action="{{route('itemList')}}" method="get">
                       @csrf
                        
                        <input type="submit" value="商品一覧へ">

                    </form>  
                    <tr>
                        <th>企業名</th>
                        <td>{{$mystore->name}}</td>
                    </tr>  
                    <tr>
                        <th>メールアドレス</th>
                        <td>{{$mystore->email}}</td>
                    </tr>
                    <tr>
                        <th>登録日</th>
                        <td>{{$mystore->created_at}}</td>
                    </tr>  
                </table>
        
            </div>
@endsection