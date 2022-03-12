@extends('layouts.layout',['title'=>'Ошибка'])


@section('content')

    <div class="card-gif">
        <h2 style="color: white"> Возвращайся обратно ! Тут тебе делать нечего ! </h2>

        <p style="font-size: 400px;display: flex;justify-content: center;">404
            <img src="{{asset('img/404page.gif')}}" alt="404" style="
    position: absolute;">




    </div>
    <div class="card-gif">
    <a href="/" class="btn btn-outline-dark"> Вернуться на главную</a>
    </div>
@endsection
