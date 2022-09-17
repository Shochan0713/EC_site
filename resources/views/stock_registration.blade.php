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
            <select class="form-control" id="brand" name="brand" onchange="clickBtn3()" required>
                @foreach($brands as $brand)
                    <option value="" hidden>カテゴリー▼</option>
                    <option value="{{ $brand->id }}"  >{{ $brand->name }} </option>
                @endforeach
            </select>
            <div id="div2"></div>
            <input type="button" value="div2" onclick="clickBtn3()" />
            </div>
       <button type="submit" class="btn btn-blue">入力内容確認</button>
       <script>
        function clickBtn3() {
          const brand = document.getElementById("brand");
          // 要素の追加
          if (!brand.hasChildNodes()) {
            const input1 = document.createElement("input");
            input1.setAttribute("type", "text");
            input1.setAttribute("maxlength", "5");
            input1.setAttribute("size", "10");
            input1.setAttribute("value", "ブランド名");
            div2.appendChild(input1);
          }
        }
      </script>
      
    </form>
@endsection