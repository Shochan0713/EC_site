@extends('layouts.app')

@section('content')
    <form class="edit-form" method = "POST" action =  "{{route('storeCofirm')}}">
    @csrf
       <div class="form-group">
           <p>商品名</p>
           <input type="text" name="name" required>
       </div>
       <div class="form-group">
           <p>詳細</p>
           <input type="text" name="detail" maxlength="8">
       </div>
       <div class="form-group">
           <p>料金</p>
           <input type="text" name="fee" required>
       </div>
       <div class="form-group">
           <p>アイテム画像</p>
           <input type="file" name="imgpath" class="imgform">
       </div>
       <button type="submit" class="btn btn-blue">入力内容確認</button>
    </form>
@endsection