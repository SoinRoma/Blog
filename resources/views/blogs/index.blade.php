@extends('layouts.layout',['title'=>'Главная страница'])

@section('content')


    @if(isset($_GET['search']))

        @if(count($blogs)>0)
            <h2 style="color: white">Результаты поиска по запросу {{$_GET['search']}} </h2>
            <p class="lead" style="color: white">Всего найдено {{count($blogs)}} постов</p>
        @else
            <h2 style="color: white">По завпросу <b>{{$_GET['search']}}</b> ничего не найдено!</h2>
            <a  href="{{route('blog.index')}}"class="btn btn-outline-light">Отобразить все посты</a>
        @endif
    @endif

    <div class="row">
        @foreach($blogs as $blog)
            <div class="col-6">
                <div class="card">
                    <div class="card-header">{{$blog->short_title}}</div>
                    <div class="card-body">
                        <div class="card-img"
                             style="background-image: url({{$blog->img ?? asset('img/default.jpg')}})"></div>
                         <div class="card-author1 ">
                            <div class="authorName">
                                <i class="fa fa-user fa-fw" aria-hidden="true"></i>: {{$blog->name}}
                            </div>
                            <a href="{{route('blog.show',['id'=>$blog->blog_id])}}" class="btn btn-info " >
                                <i class="fa fa-eye fa-fw" aria-hidden="true"></i>Посмотреть</a>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @if(!isset($_GET['search']))
        {{$blogs->links()}}
    @endif




@endsection
