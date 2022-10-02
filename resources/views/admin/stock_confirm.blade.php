@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('storeCompleate') }}" enctype="multipart/form-data">
        @csrf
        <div>
        <label>商品名</label>
        {{ $inputs['name'] }}
        <input
            name="name"
            value="{{ $inputs['name'] }}"
            type="hidden">
        </div>
        <div>
        <label>詳細</label>
        {{ $inputs['detail'] }}
        <input
            name="detail"
            value="{{ $inputs['detail'] }}"
            type="hidden">
        </div>
        <div>
        <label>料金</label>
        {{ $inputs['fee'] }}
        <input
            name="fee"
            value="{{ $inputs['fee'] }}"
            type="hidden">
        </div>
        <div>
        <label>アイテム画像</label>
        {{ $inputs['imgpath'] }}
        <input
            name="imgpath"
            value="{{ $inputs['imgpath'] }}"
            type="file">
        </div>
        <label>カテゴリー</label>
        {{ $category_name }}
        <input
            name="category"
            value="{{ $inputs['category'] }}"
            type="hidden">
        </div>
        <button type="submit" name="action" value="back">
            入力内容修正
        </button>
        <button type="submit" name="action" value="submit">
            登録
        </button>
    </form>
@endsection