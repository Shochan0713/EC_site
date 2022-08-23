@extends('layouts.app')

@section('content')
<div class="card-body pt-0 pb-2">
    <h3 class="h4 card-title">
        ご登録ありがとうございました！
    </h3>
    <div>
    <form action="{{route('adminStore')}}" method="get">
                        @csrf
                        <input type="submit" value="商品一覧">
    </form>
    </div>
</div>
@endsection