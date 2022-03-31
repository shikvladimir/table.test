@extends('layout')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="form" method="POST" action="{{route('product.update',['product' => $product])}}">
        @method('PUT')
        @csrf
        <h3>
            Редактировать товар
        </h3>
        <div class="item" >
            <input
                value="{{$product->article}}"
                name="article"
                type="text"
                placeholder="article">
        </div>
        <div class="item">
            <input
                value="{{$product->name}}"
                name="name"
                type="text"
                placeholder="name">
        </div>
        <div class="item">
            <input
                value="{{$product->status}}"
                name="status"
                type="text"
                placeholder="status">
        </div>
        <div class="item">
            <input
                value="{{$product->color}}"
                name="color"
                type="text"
                placeholder="color">
        </div>
        <div class="item">
            <input
                value="{{$product->size}}"
                name="size"
                type="text"
                placeholder="size">
        </div>

        <button type="submit">Сохранить</button>

    </form>

@endsection
