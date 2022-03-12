@extends('layouts.layout',['title'=>"Редактировать пост № $blog->blog_id"])
@section('content')
    <form action="{{route('blog.update',['id'=>$blog->blog_id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <h3 style="color: black">Редактировать Пост</h3>
        <div class="form-group">
            <input type="text" class="form-control" name="title" required value="{{ old('title')?? $blog->title ??''}}">
        </div>
        <div class="form-group">
            <textarea name="description"  class="form-control"  rows="8" required  >{{old('description')??$blog->description ?? ''  }}</textarea>
        </div>
        <div class="form-group">
            <input type="file" name="img" style="color: black">
        </div>
        <input type="submit" value="Редактировать" class="btn btn-outline-info">
        <a href="{{route('blog.index')}}" class="btn btn-primary"> <i class="fa fa-arrow-left fa-fw" style="color: white"
                                                                    aria-hidden="true"></i>На главную</a>
    </form>

@endsection
