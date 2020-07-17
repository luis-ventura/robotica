<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts= Post::with('user')->orderBy('id','desc')->paginate(5);
        return view('posts.index',['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'       => 'required',
            'description' => 'required',
            'url'         => 'required'
        ]);

        $posts = new Post;
        $posts->fill($request->only('title','description','url'));
        $posts->user_id = auth()->user()->id;
        $posts->save();

        return redirect()->route('posts.index')->with('Creado');
    }

    public function show($id)
    {
        $posts = Post::findOrFail($id);
        return view('posts.show',['posts' => $posts]);
    }

    public function edit($id)
    {
        $posts = Post::findOrFail($id);

        if($posts->user_id != \Auth::user()->id) {
            return redirect()->route('posts.index');
        }

        return view('posts.edit',['posts' => $posts]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'       => 'required',
            'description' => 'required',
            'url'         => 'required'
        ]);

        $posts = Post::findOrFail($id);

        if($posts->user_id != \Auth::user()->id) {
            return redirect()->route('posts.index');
        }

        $posts->update($request->only('title','description','url'));

        return redirect()->route('posts.show',$posts->id);
    }

    public function destroy($id)
    {
        $posts = Post::findOrFail($id);

        if($posts->user_id != \Auth::user()->id) {
            return redirect()->route('posts.index');
        }

        $posts->delete();
        return redirect()->route('posts.index');
    }
}
