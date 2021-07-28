<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
    <link rel="shortcut icon" href="{{asset('def.ico')}}">
    <title>{{$title}}</title>
</head>
<body>

<nav class=" navbar navbar-expand-lg navbar-light ">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="col-6 navbar-nav mr-auto">
            <li class="nav-item active ">
                <a class="nav-link " style="color: white" href="{{route('blog.index')}}"><i class="fa fa-home fa-fw"
                                                                                            aria-hidden="true"></i>&nbsp;
                    Главная</a>
            </li>
            <li class="nav-item active offset-1 ">
                <a class="nav-link" style="color: white" href="{{route('blog.create')}}"><i class="fa fa-plus fa-fw"
                                                                                            aria-hidden="true"></i>&nbsp;
                    Добавить</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0 " action="{{route('blog.index')}}">
            <input class="form-control mr-sm-2" name="search" type="search" placeholder="Найти пост"
                   aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fa fa-search fa-fw"
                                                                                aria-hidden="true"></i>&nbsp; Поиск
            </button>
        </form>
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" style="color: white" href="{{ route('login') }}">
                        <i class="fa fa-user-circle fa-fw"
                           aria-hidden="true"></i>&nbsp;
                    </a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" style="color: white" href="{{ route('register') }}">
                            <i class="fa fa-address-card fa-fw"
                               aria-hidden="true"></i>&nbsp;
                        </a>
                    </li>
                @endif
            @else

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" style="color: white" class="nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fa fa-user-circle fa-fw"
                           aria-hidden="true"></i>&nbsp;  {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Выйти') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>

<div class="container">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endforeach
    @endif
    @if(session('success'))
        <div class="alert alert-dark alert-dismissible fade show" role="alert">
           {{session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @yield('content')

</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
