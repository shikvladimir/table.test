@extends('layout')
@section('content')
<form action="{{route('product.create')}}">
    <button class="button" type="submit">Создать продукт</button>
</form>
<div class="container">


    <div>
        <table><h1>Таблица </h1>
            <tbody>
            <tr>
                <th>article</th>
                <th>name</th>
                <th>status</th>
                <th>color</th>
                <th>size</th>
            </tr>

            @foreach($posts as $item)
            <tr>
                <td>{{$item->article}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->status}}</td>
                <td>{{$item->color}}</td>
                <td>{{$item->size}}</td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</div>


@endsection

