@extends('layout')

@section('content')

    @if(auth()->user()->can('show product'))
        <div class="container">

            <div>
                <h1>Таблица </h1>
                <form class="item" action="{{route('product.create')}}">
                    <button class="button" type="submit">Создать продукт</button>
                </form>
                <table>
                    <tbody>
                    <tr>

                        <th>Article</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Updates</th>
                        <th>Removal</th>
                    </tr>

                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->article}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->status}}</td>
                            <td>{{$product->color}}</td>
                            <td>{{$product->size}}</td>
{{--                            @if(auth()->user()->can('edit product'))--}}
                                <td><a href="{{route('product.edit',$product->id)}}">Edit</a></td>
{{--                            @endif--}}
                            <td>
                                <form action="{{route('product.destroy',$product->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    @endif





@endsection

