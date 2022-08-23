@extends('layouts.app')

@section('content')
        <h3>プロフィール</h3>
        
        
            <div style="margin-top: 30px;">
        
                <table class="table table-striped">
                    <form action="{{route('shop')}}" method="get">
                       @csrf
                        
                        <input type="submit" value="商品一覧へ">

                    </form>  
                    <tr>
                        <th>企業名</th>
                        <td>{{ Auth::user()->name }}</td>
                    </tr>  
                    <tr>
                        <th>メールアドレス</th>
                        <td>{{ Auth::user()->email }}</td>
                    </tr>  
                </table>
        
            </div>
@endsection