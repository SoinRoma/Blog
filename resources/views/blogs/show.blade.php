@extends('layouts.layout',['title'=>"Пост № $blog->blog_id.$blog->title"])

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">{{$blog->title}}</div>
            <div class="card-body">
                <div class="card-img card-img_max"
                     style="background-image: url({{$blog->img ?? asset('img/default.jpg')}})"></div>
                <div class="card-description"><b><i class="fa fa-pencil fa-fw"
                                                    aria-hidden="true"></i>: {{ $blog->description }}</b></div>
                <div class="card-author "><i class="fa fa-user fa-fw"
                                             aria-hidden="true"></i>:{{$blog->name}}</div>
                <div class="card-date "><i class="fa fa-calendar fa-fw"
                                           aria-hidden="true"></i>: {{ $blog->created_at->diffforHumans() }}</div>

                <div class="card-btn">
                    <a href="{{route('blog.index')}}" class="btn btn-light"> <i class="fa fa-arrow-left fa-fw"
                                                                                style="color: black"
                                                                                aria-hidden="true"></i>На главную</a>
                    @auth()
                        @if(Auth::user()->id==$blog->author_id)
                        <a href="{{route('blog.edit',['id'=>$blog->blog_id])}}" class="btn btn-success"> <i
                                class="fa fa-pencil fa-fw" style="color: black"
                                aria-hidden="true"></i>Редактировать</a>

                        <form action="{{ route('blog.destroy',['id'=>$blog->blog_id]) }}" method="post"
                              onsubmit="if(confirm('Точно удалить пост ?')){return true} else {return false}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Удалить">
                        </form>
                        @endif
                    @endauth
                </div>

            </div>
        </div>
    </div>
@endsection
