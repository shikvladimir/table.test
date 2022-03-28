@extends('layout')
@section('content')
    @include('flash-message')
    <div class="form">
        <form method="POST" action="{{route('checkLogin')}}">
            @csrf
            <h5>
                Вход/Регистрация
            </h5>
            <div class="item">
                <input name="email" type="email" placeholder="login">
            </div>
            <div class="item">
                <input name="password" type="password" placeholder="password">
            </div>
            <div class="bt">
                <button type="submit">Отправить</button>
            </div>

        </form>

        <form class="bt" method="GET" action="{{route('registrationPage')}}">
            <button type="submit">Регистрация</button>
        </form>
    </div>
@endsection
