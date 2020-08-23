<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Http\Requests\BlogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Psy\Util\Str;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if($request->search){
            $blogs=Blog::join('users','author_id','=','users.id')
                ->where('title','like','%'.$request->search. '%')
                ->orwhere('name','like','%'.$request->search. '%')
                ->orwhere('description','like','%'.$request->search. '%')
                ->orderby('blogs.created_at','desc')
                ->get();
            return view('blogs.index', compact('blogs'));
        }

        $blogs=Blog::join('users','author_id','=','users.id')
        ->orderby('blogs.created_at','desc')
        ->paginate(4);
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('blogs.create');
    }


    public function store(BlogRequest $request)
    {
        $blogs =new Blog();
        $blogs->title =$request->title;
        $blogs->short_title = \Illuminate\Support\Str::length($request->title)>30 ?
            \Illuminate\Support\Str::substr($request->title,0,30) . '...' : $request->title;
        $blogs->description =$request->description;
        $blogs->author_id = \Auth::user()->id;

        if($request->file('img')){
            $path=Storage::putFile('public',$request->file('img'));
            $url=Storage::url($path);
            $blogs->img=$url;
        }

        $blogs->save();
        return redirect()->route('blog.index')->with('success','Ваш пост создан!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $blog = Blog::join('users', 'author_id', '=', 'users.id')->find($id);

        if (!$blog) {
            return redirect()->route('blog.index')->withErrors('Такой страницы нет на сайте');
        }
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $blog = Blog::find($id);

        if ($blog->author_id != \Auth::user()->id) {
           return redirect()->route('blog.index')->withErrors('Вы не можете редактировать этот пост');
       }

        if (!$blog) {
            return redirect()->route('blog.index')->withErrors('Такой страницы нет на сайте');
        }

        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BlogRequest $request, $id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return redirect()->route('blog.index')->withErrors('Такой страницы нет на сайте');
        }

        if ($blog->author_id != \Auth::user()->id) {
            return redirect()->route('blog.index')->withErrors('Вы не можете редактировать этот пост');
        }

        $blog->title = $request->title;
        $blog->short_title = \Illuminate\Support\Str::length($request->title)>30 ?
            \Illuminate\Support\Str::substr($request->title,0,30) . '...' : $request->title;
        $blog->description = $request->description;

        if ($request->file('img')) {
            $path = Storage::putFile('public', $request->file('img'));
            $url = Storage::url($path);
            $blog->img = $url;
        }

        $blog->update();
        $id = $blog->blog_id;
        return redirect()->route('blog.show', compact('id'))->with('success', 'Пост успешно отредактирован!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return redirect()->route('blog.index')->withErrors('Такой страницы нет на сайте');
        }

        if ($blog->author_id != Auth::user()->id) {
            return redirect()->route('blog.index')->withErrors('Вы не можете удалить этот пост');
        }

        $blog->delete();
        return redirect()->route('blog.index')->with('success', 'Пост успешно удален!');
    }

}
