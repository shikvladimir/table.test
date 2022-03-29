@extends('layout')

@section('content')


<div class="container">


    <div>
        <h1>Таблица </h1>
        <form class="item" action="{{route('product.create')}}">
            <button class="button" type="submit">Создать продукт</button>
        </form>
        <table>
            <tbody>
            <tr>
                <th>article</th>
                <th>name</th>
                <th>status</th>
                <th>color</th>
                <th>size</th>
                <th>Редактирование</th>
            </tr>

            @foreach($products as $product)
            <tr>
                <td>{{$product->article}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->status}}</td>
                <td>{{$product->color}}</td>
                <td>{{$product->size}}</td>
                <td><a href="{{route('product.edit',$product->id)}}">Редактировать</a></td>

            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</div>


@endsection

