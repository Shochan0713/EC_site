@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('/css/category.css')  }}" >
<div id="top" class="wrapper">
    <ul class="product-list">
            <form action="{{route('shop')}}" method="get">
            @csrf
             
             <input type="submit" value="商品一覧へ">

            </form> 
            <div>
                <p>{{ $category[1]}}</p>
                <br>
                <img src="/image/book.jpg" alt="" class="category_image" >
            </div>
            <div>
                <p>{{ $category[2]}}</p>
                <br>
                <img src="/image/DVD.jpg" alt="" class="category_image" >
            </div>
            <div>
                <p>{{ $category[3]}}</p>
                <br>
                <img src="/image/white.jpg" alt="" class="category_image" >
            </div>
            <div>
                <p>{{ $category[4]}}</p>
                <br>
                <img src="/image/PC.jpg" alt="" class="category_image" >
            </div>
            <div>
                <p>{{ $category[5]}}</p>
                <br>
                <img src="/image/kitchn.jpg" alt="" class="category_image" >  
            </div>
            <div>
                <p>{{ $category[6]}}</p>
                <br>
                <img src="/image/eat.jpeg" alt="" class="category_image" >  
            </div>
            <div>
                <p>{{ $category[7]}}</p>
                <br>
                <img src="/image/Drack.jpg" alt="" class="category_image" >  
            </div>
            <div>
                <p>{{ $category[8]}}</p>
                <br>
                <img src="/image/Hoby.jpg.jpg" alt="" class="category_image" >  
            </div>
            <div>
                <p>{{ $category[9]}}</p>
                <br>
                <img src="/image/dress.jpg.jpg" alt="" class="category_image" >  
            </div>
            <div>
                <p>{{ $category[10]}}</p>
                <br>
                <img src="/image/sports.jpg" alt="" class="category_image" >  
            </div>
            <div>
                <p>{{ $category[11]}}</p>
                <br>
                <img src="/image/car.jpg.jpg" alt="" class="category_image" >  
            </div>
            <div>
                <p>{{ $category[12]}}</p>
                <br>
                <img src="/image/etc.jpg" alt="" class="category_image" >  
            </div>

        </div>                
        <a href="item8.html">
          <img src="img/item8.jpg" alt="">
          <p>プロダクトタイトルプロダクトタイトル</p>
          <p>&yen;99,999 +tax</p>
        </a>
      </li>
    </ul>
    <a class="link-text" href="products.html">View More</a>
  </div>


@endsection