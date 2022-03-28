@extends('layout')
@section('content')

    <form class="form" method="POST" action="{{route('product.store')}}">
        @csrf
        <h1>
            Новый товар
        </h1>
        <div class="item" >
            <input name="article" type="text" placeholder="article">
        </div>
        <div class="item">
            <input name="name" type="text" placeholder="name">
        </div>
        <div class="item">
            <input name="status" type="text" placeholder="status">
        </div>
        <div class="item">
            <input name="color" type="text" placeholder="color">
        </div>
        <div class="item">
            <input name="size" type="text" placeholder="size">
        </div>


        <button type="submit">Сохранить</button>

    </form>

@endsection
