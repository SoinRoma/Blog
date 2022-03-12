@extends('layouts.layout',['title'=>"Создать новый пост"])
@section('content')
    <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <h3 style="color: white">Создать Пост</h3>
        <div class="form-group">
            <input type="text" class="form-control" name="title" required value="{{ old('title')?? $blog->title ??''}}">
        </div>
        <div class="form-group">
            <textarea name="description"  class="form-control"  rows="8" required >{{old('description')??$blog->description ?? ''  }}</textarea>
        </div>
        <div class="form-group">
            <input type="file" name="img" style="color: gray">
        </div>
        <input type="submit" value="Создать" class="btn btn-outline-primary">
    </form>

@endsection
