@extends('layout')
@section('content')
    <div class="form">
        <form method="POST" action="{{route('registrationUser')}}">
            @csrf
            <h5>
                Регистрация
            </h5>
            <div class="item" >
                <input name="name" type="text" placeholder="name">
            </div>
            <div class="item" >
                <input name="email" type="email" placeholder="email">
            </div>
            <div class="item">
                <input name="password" type="password" placeholder="password">
            </div>
<div class="bt">
    <button  type="submit">Отправить</button>
</div>

        </form>

        <form class="bt" method="GET" action="{{route('login')}}">
            <button type="submit">Вернуться</button>
        </form>
    </div>

@endsection
