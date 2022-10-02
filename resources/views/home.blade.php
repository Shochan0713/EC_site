@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        
                    {{ __('You are logged in!!') }}
                    <form action="{{route('shop')}}" method="get">
                       @csrf
                        
                        <input type="submit" value="商品一覧へ">

                    </form> 
                    <form action="{{route('myPage')}}" method="get">
                       @csrf
                        
                        <input type="submit" value="マイページへ">

                    </form> 
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
