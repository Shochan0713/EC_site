@extends('layouts.app')

@section('content')
    <form class="edit-form" method = "POST" action =  "{{route('storeCofirm')}}" enctype="multipart/form-data" >
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
       <div class="category">
            <select class="form-control" id="category" name="category" required>
                @foreach($category as $index => $name)
                    <option value="" hidden>カテゴリー▼</option>
                    <option value="{{ $index }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
        <div class="brand">
            <input type="text" autocomplete="on" list="brand" name="brand">
            @csrf
                <datalist id="brand">
                    @foreach($brand_name as $brand)
                    <option value="" hidden>ブランド▼</option>
                    <option value="{{ $brand->id }}"  >{{ $brand->name }} </option>
                @endforeach
                </datalist>
        </div>
       <button type="submit" class="btn btn-blue">入力内容確認</button>
    </form>
@endsection