@extends('layouts.app', ['authgroup'=>'admin'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">管理者 {{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as 管理者!
                    <form action="{{route('adminStore')}}" method="get">
                       @csrf
                        
                        <input type="submit" value="登録ずみ一覧へ">

                    </form> 
                    <form action="{{route('myStore')}}" method="get">
                        @csrf
                         
                         <input type="submit" value="企業ページへ">
 
                     </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
