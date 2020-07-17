<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class PostsCommentsController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Request $request, $postId)
    {
        $this->validate($request,[
            'comment'       => 'required',
        ]);


        $comment          = new Comment();
        $comment->text    = $request->get('comment');
        $comment->post_id = $postId;
        $comment->user_id = \Auth::user()->id;
        $comment->save();

        return redirect()->route('posts.show',['post' => $postId]);
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
